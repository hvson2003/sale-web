<?=template_header('Edit Order')?>

<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_detail">Edit Order</h3>
                <form class="form_detail" action="index.php?controller=order&action=update" method="post" id="orderForm">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" class="form-control" value="<?= $order['id'] ?>" required name="id" hidden>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Fullname</span>
                        <input type="text" class="form-control" value="<?= $order['fullname'] ?>" required name="fullname" id="fullname">
                    </div>
                    <div id="fullnameError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="email" class="form-control" value="<?= $order['email'] ?>" required name="email" id="email">
                    </div>
                    <div id="emailError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Phone</span>
                        <input type="tel" class="form-control" value="<?= $order['phone'] ?>" required name="phone" id="phone">
                    </div>
                    <div id="phoneError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Address</span>
                        <input type="text" class="form-control" value="<?= $order['address'] ?>" required name="address" id="address">
                    </div>
                    <div id="addressError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Note</span>
                        <input type="text" class="form-control" value="<?= $order['note'] ?>" required name="note" id="note">
                    </div>
                    <div id="noteError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Created At</span>
                        <input type="text" class="form-control" value="<?= $order['created_at'] ?>" required name="created_at" id="created_at">
                    </div>
                    <div id="created_atError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Payment</span>
                        <input type="number" class="form-control" value="<?= $order['payment'] ?>" required name="payment" id="payment" min="0" max="1">
                    </div>
                    <div id="paymentError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Total</span>
                        <input type="number" class="form-control" value="<?= $order['total'] ?>" required name="total" id="total" min="0" max="9999999999">
                    </div>
                    <div id="totalError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Quantity</span>
                        <input type="number" class="form-control" value="<?= $order['quantity'] ?>" required name="quantity" id="quantity" min="0">
                    </div>
                    <div id="quantityError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Item</span>
                        <input type="number" class="form-control" value="<?= $order['item'] ?>" required name="item" id="item" min="0">
                    </div>
                    <div id="itemError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Payed</span>
                        <input type="number" class="form-control" value="<?= $order['payed'] ?>" required name="payed" id="payed" min="0" max="1">
                    </div>
                    <div id="payedError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Active</span>
                        <input type="number" class="form-control" value="<?= $order['active'] ?>" required name="active" id="active" min="0" max="1">
                    </div>
                    <div id="activeError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">User ID</span>
                        <input type="number" class="form-control" value="<?= $order['user_id'] ?>" required name="user_id" id="user_id" min="0">
                    </div>
                    <div id="userIdError" class="text-danger"></div>
                    <div class="form-group  float-end">
                        <input type="submit" value="Submit" class="btn btn-success" id="submitBtn">
                        <a href="index.php?controller=category&action=index" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
    // Function to validate form
    function validateForm() {
        let fullname = document.getElementById("fullname").value;
        let fullnameRegex = /^[a-zA-ZÀ-ỹẠ-ỹ ]{1,255}$/;
        let email = document.getElementById("email").value;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
        let phone = document.getElementById("phone").value;
        let phoneRegex = /^0[0-9]{9}$/; 
        let address = document.getElementById("address").value;
        let addressRegex = /^[a-zA-ZÀ-ỹẠ-ỹ0-9\s,'-]*$/; // Regex cho địa chỉ (chữ và số và một số ký tự đặc biệt)
        let payment = document.getElementById("payment").value;
        let paymentRegex = /^[01]$/; 
        let total = document.getElementById("total").value;
        let totalRegex = /^[0-9]{1,10}$/; 
        let quantity = document.getElementById("quantity").value;
        let item = document.getElementById("item").value;
        let payed = document.getElementById("payed").value;
        let active = document.getElementById("active").value;
        let user_id = document.getElementById("user_id").value;
        let numericRegex = /^[0-9]+$/; // Regex cho trường số

       //Xác thực cho tên
        if (!fullnameRegex.test(fullname)) {
            document.getElementById("fullnameError").innerText = "Họ và tên không được chứa kí tự đặc biệt và ít hơn 255 kí tự";
            return false;
        } else {
            document.getElementById("fullnameError").innerText = "";
        }

        if (!emailRegex.test(email)) {
            document.getElementById("emailError").innerText = "Không đúng định dạng Email";
            return false;
        } else {
            document.getElementById("emailError").innerText = "";
        }

        if (!phoneRegex.test(phone)) {
            document.getElementById("phoneError").innerText = "Số điện thoại là 10 số và bắt đầu bằng 0";
            return false;
        } else {
            document.getElementById("phoneError").innerText = "";
        }

 
        if (!addressRegex.test(address)) {
            document.getElementById("addressError").innerText = "Không đúng định dạng địa chỉ";
            return false;
        } else {
            document.getElementById("addressError").innerText = "";
        }


        if (!paymentRegex.test(payment)) {
            document.getElementById("paymentError").innerText = "Thanh toán phải là 0 hoặc 1";
            return false;
        } else {
            document.getElementById("paymentError").innerText = "";
        }


        if (!totalRegex.test(total)) {
            document.getElementById("totalError").innerText = "Tổng số phải là số và ít hơn 10 chữ số";
            return false;
        } else {
            document.getElementById("totalError").innerText = "";
        }

        // Xác thực cho các trường số
        if (!numericRegex.test(quantity) || !numericRegex.test(item) || !numericRegex.test(payed) || !numericRegex.test(active) || !numericRegex.test(user_id)) {
            document.getElementById("quantityError").innerText = "Số lượng phải là số";
            document.getElementById("itemError").innerText = "Item phải là số";
            document.getElementById("payedError").innerText = "Đã thanh toán phải là số";
            document.getElementById("activeError").innerText = "Hoạt động phải là số";
            document.getElementById("userIdError").innerText = "ID người dùng phải là số";
            return false;
        } else {
            document.getElementById("quantityError").innerText = "";
            document.getElementById("itemError").innerText = "";
            document.getElementById("payedError").innerText = "";
            document.getElementById("activeError").innerText = "";
            document.getElementById("userIdError").innerText = "";
        }

    // Tất cả các xác nhận đã được thông qua
        return true;
    }
    // Đính kèm xác thực biểu mẫu để gửi sự kiện
    document.getElementById("orderForm").onsubmit = function () {
        return validateForm();
    };
</script>

</body>
</html>

<?=template_footer()?>
