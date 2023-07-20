// Lấy nút thay đổi màu nền
var btn = document.getElementById("change-color");

// Thêm sự kiện click vào nút thay đổi màu nền
btn.addEventListener("click", function() {
	// Lấy thẻ body
	var body = document.getElementsByTagName("body")[0];
	
	// Thay đổi màu nền
	if (body.style.backgroundColor === "white") {
		body.style.backgroundColor = "gray";
	} else {
		body.style.backgroundColor = "white";
	}
});