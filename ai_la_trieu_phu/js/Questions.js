class Question {
    constructor(content, answer, correctAnswer, money) {
        this.content = content;
        this.answer = answer;
        this.correctAnswer = correctAnswer;
        this.money = money;
    }

    checkAnswer(answer) {
        return answer === this.correctAnswer;
    }

}

    function music() {
        musicBackground = new Audio("sound/start.mp3");
    }
    music();
    musicBackground.play();

    let timeCount;
    let message;

    let timeID = setInterval(function () {
        document.getElementById('timeCountDown').innerHTML = timeCount + " giây";
        timeCount--;
        countdown();
    }, 1000);


    function countdown() {
        let styles = document.getElementById('styleTime');
        let styleTime = document.getElementById('timeCountDown');
        if (timeCount < 0) {
         clearInterval(timeID);
            message = window.alert('Time Out!');
            reload();
        }
        if (timeCount < 5){
            styles.style.color = 'red';
            styleTime.style.color = 'red';
        }

    }

    let question1 = new Question("Câu 1:Điền từ còn thiếu vào chỗ trống trong câu: ”Đục nước béo …”? ", ["A.Vạc", "B.Cò", "C.Cá", "D.Mèo"], "B.Cò", "200.000 VNĐ");
    let question2 = new Question("Câu 2:Việt Nam có chung biên giới với quốc gia nào dưới đây?", ["A.Thái lan", "B.Myanmar", "C.Trung Quốc", "D.Bruney"], "C.Trung Quốc", "400.000 VNĐ");
    let question3 = new Question("Câu 3:Đâu là tên một ngôi chùa nổi tiếng ở Hà Nam?", ["A.Bái Đính", "B.Trấn Quốc", "C.Bồ Đà", "D.Tam Chúc"], "D.Tam Chúc", "600.000 VNĐ");
    let question4 = new Question("Câu 4:Sóng biển thường được tạo ra do cái gì?", ["A.Nắng", "B.Gió", "C.Mưa", "D.Sương Mù"], "B.Gió", "1.000.000 VNĐ");
    let question5 = new Question("Câu 5:Âm thanh có tần số lớn hơn 20KHz gọi là gì?", ["A.Siêu âm", "B.Hạ âm", "C.Cận âm", "D.Quá âm"], "A.Siêu âm", "2.000.000 VNĐ");
    let question6 = new Question("Câu 6:Tác phẩm nào được coi là tác phẩm nổi tiếng nhất của Hector Malot?", ["A.Không gia đình", "B.Đồi gió hú", "C.Giã từ vũ khí", "D.Miếng da lừa"], "A.Không gia đình", "3.000.000 VNĐ");
    let question7 = new Question("Câu 7:Đâu là một hợp kim của Nhôm?", ["A.Ferit", "B.Đuyra", "C.Alkanoid", "D.Alumin"], "B.Đuyra", "6.000.000 VNĐ");
    let question8 = new Question("Câu 8:Thiên tài Albert Einstein đã từng được mời làm tổng thống của đất nước nào?", ["A.Latvia", "B.Bungary", "C.Israel", "D.Jordan"], "C.Israel", "10.000.000 VNĐ");
    let question9 = new Question("Câu 9:Bức tượng cao nhất Trung Quốc?", ["A.Trung Nguyên Đại Phật", "B.Linh Sơn Đại Phật", "C.Tích Thủy Quan Âm", "D.Lạc Sơn Đại Phật"], "A.Trung Nguyên Đại Phật", "14.000.000 VNĐ");
    let question10 = new Question("Câu 10:Pôn Pốt mở đầu xâm lược biên giới tây nam nước ta vào ngày tháng năm nào?", ["A.20/12/1978", "B.21/12/1979", "C.21/12/1978", "D.24/12/1978"], "C.21/12/1978", "22.000.000 VNĐ");
    let question11 = new Question("Câu 11:Đạo diễn của vở nhạc kịch Kim Vân Kiều là ai??", ["A.Nguyễn Đăng Bình", "B.Johahn Bern", "C.Alisa Karnet", "D.Christophe Thiry"], "D.Christophe Thiry", "30.000.000 VNĐ");
    let question12 = new Question("Câu 12:Vật liệu nào được dùng để rèn những cây kiếm Katana huyền thoại của Nhật Bản?", ["A.Takashi", "B.Tamahagane", "C.Orihaco", "D.Katanashi"], "B.Tamahagane", "40.000.000 VNĐ");
    let question13 = new Question("Câu 13:'Thính' được làm từ gì", ["A.Gạo", "B.Mía", "C.Thịt", "D.Củ cải"], "A.Gạo", "60.000.000 VNĐ");
    let question14 = new Question("Câu 14:Động vật nào hoạt động về đêm", ["A.Ma", "B.Kẻ trộm", "C.Chim cú", "D.Dân đổ phế liệu"], "C.Chim cú", "85.000.000 VNĐ");
    let question15 = new Question("Câu 15:Vườn quốc gia nào hiện không nằm trong danh sách Vườn di sản ASEAN?", ["A.Vườn Quốc Gia Kon Ka Kinh", "B.Vườn Quốc Gia Tam Đảo", "C.Vườn Quốc Gia Chư Mom Ray", "D.Vườn Quốc Gia Bái Tử Long"], "B.Vườn Quốc Gia Tam Đảo", "150.000.000 VNĐ");

    let questions = [question1, question2, question3, question4, question5, question6, question7, question8, question9, question10,question11,question12,question13,question14,question15];
    let getQuestion = document.getElementById('question');
    showQuestion(question1);

    function next(index) {
        index++;
        showQuestion(questions[index]);
    }

    function showQuestion(question_1) {
        timeCount = 30;
        getQuestion.innerHTML = question_1.content;
        getQuestion.setAttribute("questionScreen", questions.indexOf(question_1));
        for (let i = 0; i < 4; i++) {
            let getaswId = document.getElementById('answer_' + (i + 1));
            getaswId.innerHTML = question_1.answer[i];

        }
    }


    showQuestion(question1);
    let index = 0;

    function checkAnswer(id) {
        let answer = document.getElementById(id).innerHTML;
        let getQuestionId = document.getElementById('question');
        if (!confirm("Are you sure?")) {
            return true;
        }
        if (questions[index].checkAnswer(answer)) {
            alert('You are correct');
            if (index === 14) {
            alert("Excilent, you win !");
            timeCount = 1;
            reload();
            }
        next(index);
        index++;
        console.log(index);
        document.getElementById('result').innerHTML = "Bonus: " + (questions[index].money);
        timeCount = 30;
        } else {
            alert('You lose ! Please try again');
            reload();
        }
    }

    function reload() {
        location.replace("index.html");
    }



