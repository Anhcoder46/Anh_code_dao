import time
import pygame
from settings import *
from sprites import *
import random
import heapq

class Game:
    def __init__(self):
        pygame.init()
        self.screen = pygame.display.set_mode((WIDTH, HEIGHT))
        pygame.display.set_caption(title)
        self.clock = pygame.time.Clock()
        pygame.key.set_repeat(400, 100)
        self.start_shuffle = False
        self.shuffle_time = 0
        self.previous_choice = ""
        self.choice = ""
        self.start_timer = False
        self.start_game = False
        self.elapsed_time = 0
        self.tiles = []
        self.high_score_easy = float(self.get_high_scores()[0])
        self.high_score_medium = float(self.get_high_scores()[1])
        self.high_score_hard = float(self.get_high_scores()[2])

    def get_high_scores(self):
        with open("high_scores.txt", "r") as file:
            scores = file.read().splitlines()
        return scores

    def save_score(self):
        with open("high_scores.txt", "w") as file:
            file.write(str("%.3f\n" % self.high_score_easy))
            file.write(str("%.3f\n" % self.high_score_medium))
            file.write(str("%.3f" % self.high_score_hard))

    def create_game(self, game_size):
        grid = [[x + y * game_size for x in range(1, game_size + 1)] for y in range(game_size)]
        grid[-1][-1] = 0
        return grid

    def shuffle(self):
        possible_moves = []
        for row, tiles in enumerate(self.tiles):
            for col, tile in enumerate(tiles):
                if tile.text == "empty":
                    if tile.right(): possible_moves.append("right")
                    if tile.left(): possible_moves.append("left")
                    if tile.up(): possible_moves.append("up")
                    if tile.down(): possible_moves.append("down")
                    break
            if possible_moves: break

        if self.previous_choice == "right":
            possible_moves = [m for m in possible_moves if m != "left"]
        elif self.previous_choice == "left":
            possible_moves = [m for m in possible_moves if m != "right"]
        elif self.previous_choice == "up":
            possible_moves = [m for m in possible_moves if m != "down"]
        elif self.previous_choice == "down":
            possible_moves = [m for m in possible_moves if m != "up"]

        self.choice = random.choice(possible_moves)
        self.previous_choice = self.choice
        if self.choice == "right":
            self.tiles_grid[row][col], self.tiles_grid[row][col + 1] = self.tiles_grid[row][col + 1], self.tiles_grid[row][col]
        elif self.choice == "left":
            self.tiles_grid[row][col], self.tiles_grid[row][col - 1] = self.tiles_grid[row][col - 1], self.tiles_grid[row][col]
        elif self.choice == "up":
            self.tiles_grid[row][col], self.tiles_grid[row - 1][col] = self.tiles_grid[row - 1][col], self.tiles_grid[row][col]
        elif self.choice == "down":
            self.tiles_grid[row][col], self.tiles_grid[row + 1][col] = self.tiles_grid[row + 1][col], self.tiles_grid[row][col]

    def new(self):
        self.all_sprites = pygame.sprite.Group()
        self.tiles_grid = self.create_game(self.game_size)
        self.tiles_grid_completed = self.create_game(self.game_size)
        self.elapsed_time = 0
        self.moves = 0
        self.start_timer = False
        self.start_game = False
        self.draw_buttons()
        self.draw_tiles()

    def draw_timer(self, timer):
        UIElement(825, 35, timer).draw(self.screen, 40)

    def draw_high_score(self, score):
        UIElement(710, 380, score).draw(self.screen, 30)

    def draw_buttons(self):
        self.buttons_list = []
        self.buttons_list.append(Button(self, 775, 100, "Sáo trộn", 200, 50))
        self.buttons_list.append(Button(self, 775, 170, "Giải", 200, 50))
        self.buttons_list.append(Button(self, 690, 240, "Dễ", 80, 50))
        self.buttons_list.append(Button(self, 780, 240, "Trung bình", 170, 50))
        self.buttons_list.append(Button(self, 960, 240, "Khó", 80, 50))

    def draw_tiles(self):
        self.tiles = []
        for row, x in enumerate(self.tiles_grid):
            self.tiles.append([])
            for col, tile in enumerate(x):
                self.tiles[row].append(Tile(self, col, row, str(tile) if tile != 0 else "empty"))

    def run(self):
        self.playing = True
        while self.playing:
            self.clock.tick(FPS)
            self.events()
            self.update()
            self.draw()

    def quit(self):
        pygame.quit()

    def update(self):
        if self.start_game:
            if self.tiles_grid == self.tiles_grid_completed:
                self.start_game = False
                if self.game_choice == EASY:
                    self.high_score_easy = min(self.high_score_easy, self.elapsed_time) if self.high_score_easy > 0 else self.elapsed_time
                elif self.game_choice == MEDIUM:
                    self.high_score_medium = min(self.high_score_medium, self.elapsed_time) if self.high_score_medium > 0 else self.elapsed_time
                elif self.game_choice == HARD:
                    self.high_score_hard = min(self.high_score_hard, self.elapsed_time) if self.high_score_hard > 0 else self.elapsed_time
                self.save_score()

            if self.start_timer:
                self.timer = time.time()
                self.start_timer = False
            self.elapsed_time = time.time() - self.timer

        if self.start_shuffle:
            self.shuffle()
            self.draw_tiles()
            self.shuffle_time += 1
            if self.shuffle_time > 100:
                self.start_shuffle = False
                self.start_timer = True
                self.start_game = True
        self.all_sprites.update()

    def draw_grid(self):
        for row in range(-1, self.game_choice, TILESIZE):
            pygame.draw.line(self.screen, LIGHTGREY, (row, 0), (row, self.game_choice))
        for col in range(-1, self.game_choice, TILESIZE):
            pygame.draw.line(self.screen, LIGHTGREY, (0, col), (self.game_choice, col))

    def draw(self):
        self.screen.fill(BGCOLOUR)
        self.all_sprites.draw(self.screen)
        self.draw_grid()
        if self.game_choice == EASY:
            UIElement(840, 320, "Dễ").draw(self.screen, 30)
            self.draw_high_score("Điểm - %.3f" % (self.high_score_easy if self.high_score_easy > 0 else 0))
        elif self.game_choice == MEDIUM:
            UIElement(820, 320, "Trung bình").draw(self.screen, 30)
            self.draw_high_score("Điểm - %.3f" % (self.high_score_medium if self.high_score_medium > 0 else 0))
        elif self.game_choice == HARD:
            UIElement(840, 320, "Khó").draw(self.screen, 30)
            self.draw_high_score("Điểm - %.3f" % (self.high_score_hard if self.high_score_hard > 0 else 0))
        self.draw_timer("%.3f" % self.elapsed_time)
        pygame.display.flip()

    def events(self):
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                self.quit()
                quit(0)
            if event.type == pygame.MOUSEBUTTONDOWN:
                mouse_x, mouse_y = pygame.mouse.get_pos()
                for row, tiles in enumerate(self.tiles):
                    for col, tile in enumerate(tiles):
                        if tile.click(mouse_x, mouse_y):
                            if tile.right() and self.tiles_grid[row][col + 1] == 0:
                                self.tiles_grid[row][col], self.tiles_grid[row][col + 1] = self.tiles_grid[row][col + 1], self.tiles_grid[row][col]
                            elif tile.left() and self.tiles_grid[row][col - 1] == 0:
                                self.tiles_grid[row][col], self.tiles_grid[row][col - 1] = self.tiles_grid[row][col - 1], self.tiles_grid[row][col]
                            elif tile.up() and self.tiles_grid[row - 1][col] == 0:
                                self.tiles_grid[row][col], self.tiles_grid[row - 1][col] = self.tiles_grid[row - 1][col], self.tiles_grid[row][col]
                            elif tile.down() and self.tiles_grid[row + 1][col] == 0:
                                self.tiles_grid[row][col], self.tiles_grid[row + 1][col] = self.tiles_grid[row + 1][col], self.tiles_grid[row][col]
                            self.draw_tiles()
                            self.moves += 1

                for button in self.buttons_list:
                    if button.click(mouse_x, mouse_y):
                        if button.text == "Dễ":
                            self.game_choice = EASY
                            self.game_size = 3
                            self.new()
                        elif button.text == "Trung bình":
                            self.game_choice = MEDIUM
                            self.game_size = 4
                            self.new()
                        elif button.text == "Khó":
                            self.game_choice = HARD
                            self.game_size = 5
                            self.new()
                        if button.text == "Sáo trộn":
                            self.shuffle_time = 0
                            self.start_shuffle = True
                        if button.text == "Giải":
                            path = a_star(self.tiles_grid, self.tiles_grid_completed)
                            for state in path:
                                self.tiles_grid = state
                                self.draw_tiles()
                                self.update()
                                self.draw()
                                pygame.time.delay(150)

            elif event.type == pygame.KEYDOWN:
                if event.key == pygame.K_SPACE:
                    self.start_shuffle = not self.start_shuffle

    def show_start_screen(self):
        self.game_choice = EASY
        self.game_size = 3

    def show_go_screen(self):
        pass

def serialize(grid):
    return tuple(tuple(row) for row in grid)

def find_zero(grid):
    for i, row in enumerate(grid):
        for j, value in enumerate(row):
            if value == 0:
                return i, j

def get_neighbors(grid):
    neighbors = []
    row, col = find_zero(grid)
    directions = [(-1, 0), (1, 0), (0, -1), (0, 1)]

    for dr, dc in directions:
        new_r, new_c = row + dr, col + dc
        if 0 <= new_r < len(grid) and 0 <= new_c < len(grid[0]):
            new_grid = [list(r) for r in grid]
            new_grid[row][col], new_grid[new_r][new_c] = new_grid[new_r][new_c], new_grid[row][col]
            neighbors.append((new_grid, (new_r, new_c)))
    return neighbors

def manhattan(grid, goal):
    dist = 0
    size = len(grid)
    goal_pos = {value: (r, c) for r, row in enumerate(goal) for c, value in enumerate(row)}
    for r in range(size):
        for c in range(size):
            value = grid[r][c]
            if value != 0:
                goal_r, goal_c = goal_pos[value]
                dist += abs(goal_r - r) + abs(goal_c - c)
    return dist

def a_star(start, goal):
    frontier = []
    heapq.heappush(frontier, (0, start))
    came_from = {}
    cost_so_far = {}
    came_from[serialize(start)] = None
    cost_so_far[serialize(start)] = 0
    path = []

    while frontier:
        _, current = heapq.heappop(frontier)

        if current == goal:
            break

        for neighbor, _ in get_neighbors(current):
            ser = serialize(neighbor)
            new_cost = cost_so_far[serialize(current)] + 1
            if ser not in cost_so_far or new_cost < cost_so_far[ser]:
                cost_so_far[ser] = new_cost
                priority = new_cost + manhattan(neighbor, goal)
                heapq.heappush(frontier, (priority, neighbor))
                came_from[ser] = current

    current = goal
    while current != start:
        path.append(current)
        current = came_from[serialize(current)]
        if current is None:
            return []
    path.reverse()
    return path

game = Game()
game.show_start_screen()
while True:
    game.new()
    game.run()
    game.show_go_screen()
