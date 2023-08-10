
#include <iostream>
#include <conio.h>
#include <windows.h>

#define SCREEN_WIDTH 52
#define SCREEN_HEIGHT 20

#define MINX 2
#define MINY 2
#define MAXX 49
#define MAXY 19

using namespace std;

HANDLE console = GetStdHandle(STD_OUTPUT_HANDLE);
COORD CursorPosition;

int bricks[24][2] = {
    { 2, 7 }, { 2, 12 }, { 2, 17 }, { 2, 22 }, { 2, 27 }, { 2, 32 }, { 2, 37 }, { 2, 42 },
    { 4, 7 }, { 4, 12 }, { 4, 17 }, { 4, 22 }, { 4, 27 }, { 4, 32 }, { 4, 37 }, { 4, 42 },
    { 6, 7 }, { 6, 12 }, { 6, 17 }, { 6, 22 }, { 6, 27 }, { 6, 32 }, { 6, 37 }, { 6, 42 }
};
int visibleBricks[24] = { 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 };
int sliderPos[2] = { 18, 22 };
int ballPos[2] = { 17, 26 };
int startBall = 0;
int dir = 1; // 1-TopRight, 2-TopLeft, 3-BottomLeft, 4-BottomRight
int bricksLeft = 24;
int win = 0;
int lose = 0;

void gotoxy(int x, int y) {
    CursorPosition.X = x;
    CursorPosition.Y = y;
    SetConsoleCursorPosition(console, CursorPosition);
}

void setcursor(bool visible, DWORD size) {
    CONSOLE_CURSOR_INFO lpCursor;
    lpCursor.bVisible = visible;
    lpCursor.dwSize = size;
    SetConsoleCursorInfo(console, &lpCursor);
}

void drawBorder() {
    gotoxy(0, 0);
    cout << ".............................................";
    gotoxy(0, SCREEN_HEIGHT);
    cout << ".............................................";

    for (int i = 0; i < SCREEN_HEIGHT; i++) {
        gotoxy(0, i);
        cout << "|";
        gotoxy(SCREEN_WIDTH, i);
        cout << "|";
    }
}

void drawBricks() {
    for (int i = 0; i < 24; i++) {
        if (visibleBricks[i] == 1) {
            gotoxy(bricks[i][1], bricks[i][0]);
            cout << "++++";
        }
    }
}

void ballHitSlider() {
    if (ballPos[0] >= sliderPos[0] && ballPos[0] <= sliderPos[0] + 8) {
        if (ballPos[1] == sliderPos[1] - 1) {
            if (dir == 3)
                dir = 2;
            else if (dir == 4)
                dir = 1;
        }
    }
}

void ballHitBricks() {
    for (int i = 0; i < 24; i++) {
        if (visibleBricks[i] == 1) {
            if (ballPos[0] >= bricks[i][0] && ballPos[0] <= bricks[i][0] + 2) {
                if (ballPos[1] >= bricks[i][1] && ballPos[1] <= bricks[i][1] + 4) {
                    visibleBricks[i] = 0;
                    bricksLeft--;
                }
            }
        }
    }
}

void play() {
    while (1) {
        system("cls");
        drawBricks();
        drawBorder();

        gotoxy(sliderPos[1], sliderPos[0]);
        cout << "++++++++++";

        gotoxy(ballPos[1], ballPos[0]);
        cout << "0";

        if (_kbhit()) {
            char ch = _getch();
            if (ch == 'd' || ch == 'D' || ch == 77) {
                if (sliderPos[1] < 44)
                    sliderPos[1] = sliderPos[1] + 2;
            }
            if (ch =='A' || ch == 75) {
if (sliderPos[1] > 2)
sliderPos[1] = sliderPos[1] - 2;
}
if (ch == 32) {
startBall = 1;
}
if (ch == 27) {
break;
}
}
if (startBall == 1) {
        if (dir == 1) { // TOPRIGHT
            ballPos[0] = ballPos[0] - 1;
            ballPos[1] = ballPos[1] + 1;
        }
        else if (dir == 2) { // TOPLEFT
            ballPos[0] = ballPos[0] - 1;
            ballPos[1] = ballPos[1] - 1;
        }
        else if (dir == 3) { // BOTTOMLEFT
            ballPos[0] = ballPos[0] + 1;
            ballPos[1] = ballPos[1] - 1;
        }
        else if (dir == 4) { // BOTTOMRIGHT
            ballPos[0] = ballPos[0] + 1;
            ballPos[1] = ballPos[1] + 1;
        }

        ballHitSlider();
        ballHitBricks();

        if (ballPos[0] > MAXX || ballPos[0] < MINX) {
            if (dir == 1)
                dir = 2;
            else if (dir == 4)
                dir = 3;
        }

        if (ballPos[1] > MAXY || ballPos[1] < MINY) {
            if (dir == 2)
                dir = 3;
            else if (dir == 1)
                dir = 4;
        }

        if (bricksLeft == 0) {
            win = 1;
            break;
        }

        if (ballPos[0] == sliderPos[0] + 1 && ballPos[1] == sliderPos[1] - 1) {
            if (dir == 2)
                dir = 1;
        }
    }

    Sleep(10);
}

system("cls");
drawBricks();
drawBorder();

gotoxy(sliderPos[1], sliderPos[0]);
cout << "++++++++++";

gotoxy(ballPos[1], ballPos[0]);
cout << "0";

gotoxy(20, 10);

if (win == 1)
    cout << "YOU WON!";
else
    cout << "YOU LOST!";

_getch();
}

int main() {
setcursor(0, 0);
play();
return 0;
}