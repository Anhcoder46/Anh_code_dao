document.addEventListener("DOMContentLoaded", function() {
    var productList = document.querySelectorAll('.products ul li.main-product');
    var itemsPerPage = 8; // Số lượng sản phẩm trên mỗi trang
    var totalPages = Math.ceil(productList.length / itemsPerPage);

    var pagination = document.querySelector('.pagination');
    for (var i = 1; i <= totalPages; i++) {
        var pageLink = document.createElement('a');
        pageLink.href = '#products';
        pageLink.textContent = i;
        pageLink.dataset.page = i;
        pagination.appendChild(pageLink);
    }

    showPage(1); // Hiển thị trang đầu tiên mặc định

    pagination.addEventListener('click', function(e) {
        if (e.target.tagName === 'A') {
            var pageNumber = parseInt(e.target.dataset.page);
            showPage(pageNumber);
        }
    });

    function showPage(pageNumber) {
        var startIndex = (pageNumber - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;
        productList.forEach(function(item, index) {
            if (index >= startIndex && index < endIndex) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
        updateActivePage(pageNumber);
    }

    function updateActivePage(pageNumber) {
        var links = pagination.querySelectorAll('a');
        links.forEach(function(link) {
            link.classList.remove('active');
            if (parseInt(link.dataset.page) === pageNumber) {
                link.classList.add('active');
            }
        });
    }
});