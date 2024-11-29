
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <h5>Services</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Chính sách</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Terms & Policy</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Chính sách</a></li>
                    <li><a href="#">Chính sách</a></li>
                    <li><a href="#">Chính sách</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Số điện thoại</a></li>
                    <li><a href="#">Email</a></li>
                    <li><a href="#">Địa chỉ</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Tracking Your Order</h5>
                <p>Enter your email,order code or phone numbers to find your oders</p>
                <form class="d-flex">
                    <input type="email" class="form-control me-2" placeholder="you@example.com">
                    <button class="btn btn-outline-light">Submit</button>
                </form>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-2"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fa fa-youtube"></i></a>
                </div>                
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>&copy; 2023 Vask All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity-input");
    const totalElement = document.querySelector(".total-price");

    quantityInputs.forEach(input => {
        input.addEventListener("change", function () {
            const productId = this.dataset.productId;
            const productPrice = parseFloat(this.dataset.productPrice);
            const newQuantity = parseInt(this.value);

            if (isNaN(productPrice) || isNaN(newQuantity) || newQuantity < 1) {
                alert("Số lượng không hợp lệ!");
                this.value = 1; // Reset về 1 nếu nhập sai
                return;
            }

            // Cập nhật thành tiền cho sản phẩm
            const row = this.closest("tr");
            const totalCell = row.querySelector(".product-total");
            const newTotal = productPrice * newQuantity;
            totalCell.textContent = newTotal.toLocaleString("vi-VN") + " VND";

            // Cập nhật tổng tiền toàn bộ
            updateOverallTotal();

            // Gửi dữ liệu mới đến server
            updateCartOnServer(productId, newQuantity);
        });
    });

    function updateCartOnServer(productId, newQuantity) {
        fetch("index.php?act=update_cart", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: productId, quantity: newQuantity }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status !== "success") {
                    alert("Cập nhật giỏ hàng thất bại!");
                }
            })
            .catch(error => console.error("Lỗi khi cập nhật giỏ hàng:", error));
    }

    function updateOverallTotal() {
        let overallTotal = 0;
        document.querySelectorAll(".product-total").forEach(cell => {
            const cellValue = parseFloat(cell.textContent.replace(/\D/g, ""));
            if (!isNaN(cellValue)) {
                overallTotal += cellValue;
            }
        });
        totalElement.textContent = overallTotal.toLocaleString("vi-VN") + " VND";
    }
});


</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"></script>
</body>
</html>
