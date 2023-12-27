const messagesContent = $('.msgs-content');
const messageInput = $('.msg-input');
const messageSubmit = $('.msg-submit');
const avatarImage = 'logo.png';
const fakeMessages = [
    'Hi',
    'Nice to meet you!',
    'Cảm ơn. Tôi ăn cơm rồi',
    'A đù cái gì mà a đù, bot thì không được ăn cơm ak',
    'Haha, chịu :))',
    'Sai ở đâu thì bạn vào code mà sửa nhé.',
    'Xin lỗi, bạn tạo ra tôi mà bắt tôi sửa ak',
    'Để tôi thông minh hơn bạn cần: Programming Language: You will need a programming language like Python, JavaScript, Java, etc., to write the code for your chatbot.Development Framework or Tools: Utilize frameworks or tools specialized in chatbot development. Popular ones include Microsoft Bot Framework, Google Dialogflow, IBM Watson, or open-source libraries like Rasa. Natural Language Processing (NLP): Implement NLP techniques to help your chatbot understand and respond to human language effectively. This involves tasks like text tokenization, entity recognition, sentiment analysis, etc. Machine Learning Models: Often, chatbots use machine learning models, especially in NLP, to learn and improve their responses over time. Models can range from rule-based systems to more advanced deep learning models. Training Data: Gather and curate data that your chatbot will learn from. This includes conversational data, FAQs, and any relevant information that the chatbot will use to understand user queries and provide accurate responses. User Interface: Develop a user interface through which users can interact with the chatbot. This might be a website interface, mobile app, or integrations into messaging platforms like Facebook Messenger or WhatsApp. Testing and Improvement: After building the chatbot, rigorous testing is essential to ensure it works as intended. Continuous improvement and feedback integration are crucial to refine the bot is performance. Integration and Deployment: Once your chatbot is developed and tested, you need to integrate it with the desired platforms and deploy it to start interacting with users.',
    'OK, cảm ơn',
    'Chờ tôi một tí nhé!',
    '#include<iostream> #include<math.h> using namespace std; int main() { //khai báo biến long temp, n; int S = 0; //sử dụng dowhile để yêu cầu người dùng nhập vào só lớn hơn 0 //nếu n < 0 thì yêu cầu nhập lại do { cout<<"\nNhập vào số nguyên n lớn hơn 0: "; cin >> n; if(n <= 0) { cout<<"\n Số n phải lớn hơn 0, vui lòng nhập lại !"; } }while(n <= 0); //gán biến n cho temp, ta sẽ sử dụng temp để đếm các chữ số temp = n; while(temp != 0) { if(temp % 2 == 0){ S = S + temp % 10; } temp = temp / 10; } cout<<"\nTổng các chữ số chẵn của "<<n<<" là: "<< S; }',
    'Không có gì, nếu bạn cần thêm thông tin hoặc có bất kỳ câu hỏi nào khác, đừng ngần ngại hỏi tôi!'
];

let minutes = 0;

$(window).on('load', function () {
    messagesContent.mCustomScrollbar();
    setTimeout(fakeMessage, 100);
});

function updateScrollbar() {
    messagesContent.mCustomScrollbar('update').mCustomScrollbar('scrollTo', 'bottom', {
        scrollInertia: 10,
        timeout: 0
    });
};

function addTimestamp() {
    const date = new Date();
    const minutesNow = date.getMinutes();

    if (minutes !== minutesNow) {
        minutes = minutesNow;
        const timeStamp = $('<div class="timestamp"></div>').text(`${date.getHours()}:${minutes}`);
        $('.msg:last').append(timeStamp);
    };
};

function addMessageToPage(msg, isPersonal = false) {
    const message = $('<div class="msg"></div>').text(msg);
    if (isPersonal) {
        message.addClass('msg-personal');
    } else {
        const figure = $('<figure class="avatar"></figure>');
        const image = $('<img>').attr('src', avatarImage);
        figure.append(image);
        message.addClass('new').prepend(figure);
    };
    $('.mCSB_container').append(message);
    addTimestamp();
    updateScrollbar();
};


function insertMessage() {
    const messageText = messageInput.val().trim();
    if (messageText === '') {
        return false;
    };
    addMessageToPage(messageText, true);
    messageInput.val(null);
    setTimeout(fakeMessage, 1000 + (Math.random() * 20) * 100);
};

messageInput.on('keydown', function (e) {

    if (e.which === 13) {
        insertMessage();
        return false;
    };
});

messageSubmit.on('click', insertMessage);

function fakeMessage() {
    if (messageInput.val() !== '') {
        return false;
    };

    const loadingMessage = $('<div class="msg loading new"></div>');
    const figure = $('<figure class="avatar"></figure>');
    const image = $('<img>').attr('src', avatarImage);
    figure.append(image);
    loadingMessage.append(figure).append($('<span></span>'));
    $('.mCSB_container').append(loadingMessage);
    updateScrollbar();

    setTimeout(function () {
        loadingMessage.remove();
        addMessageToPage(fakeMessages.shift());
    }, 1000 + (Math.random() * 20) * 100);
}