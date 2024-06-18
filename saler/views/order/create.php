<?=template_header('Create Order')?>

<body>
    <main class="container mt-5 mb-5 container_create">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold title_create">Create Order</h3>
                <form class="form_create" action="index.php?controller=category&order=store" method="post" id="orderForm">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Fullname</span>
                        <input type="text" class="form-control" required name="fullname" id="fullname">
                    </div>
                    <div id="fullnameError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Email</span>
                        <input type="email" class="form-control" required name="email" id="email">
                    </div>
                    <div id="emailError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Phone</span>
                        <input type="tel" class="form-control" required name="phone" id="phone">
                    </div>
                    <div id="phoneError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Address</span>
                        <input type="text" class="form-control" required name="address" id="address">
                    </div>
                    <div id="addressError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Note</span>
                        <input type="text" class="form-control" required name="note" id="note">
                    </div>
                    <div id="noteError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Created At</span>
                        <input type="text" class="form-control" required name="created_at" id="created_at">
                    </div>
                    <div id="created_atError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Payment</span>
                        <input type="number" class="form-control" required name="payment" id="payment" min="0" max="1">
                    </div>
                    <div id="paymentError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Total</span>
                        <input type="number" class="form-control" required name="total" id="total" min="0" max="9999999999">
                    </div>
                    <div id="totalError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Item</span>
                        <input type="number" class="form-control" required name="item" id="item" min="0">
                    </div>
                    <div id="itemError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Payed</span>
                        <input type="number" class="form-control" required name="payed" id="payed" min="0" max="1">
                    </div>
                    <div id="payedError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Active</span>
                        <input type="number" class="form-control" required name="active" id="active" min="0" max="1">
                    </div>
                    <div id="activeError" class="text-danger"></div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">User ID</span>
                        <input type="number" class="form-control" required name="user_id" id="user_id" min="0">
                    </div>
                    <div id="userIdError" class="text-danger"></div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" class="btn btn-success" id="submitBtn">
                        <a href="index.php?controller=order&action=index" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
 
    function validateForm() {
        let fullname = document.getElementById("fullname").value;
        let email = document.getElementById("email").value;
        let phone = document.getElementById("phone").value;
        let address = document.getElementById("address").value;
        let note = document.getElementById("note").value;
        let created_at = document.getElementById("created_at").value;
        let payment = document.getElementById("payment").value;
        let total = document.getElementById("total").value;
        let item = document.getElementById("item").value;
        let payed = document.getElementById("payed").value;
        let active = document.getElementById("active").value;
        let user_id = document.getElementById("user_id").value;
        let numericRegex = /^[0-9]+$/; // Regex cho trường số

        //Định dạng cho họ và tên
        if (!fullname.match(/^[\p{L} ]+$/u) || fullname.length > 255) {
            document.getElementById("fullnameError").innerText = "Họ và tên không được chứa kí tự đặc biệt và nhỏ hơn 255 kí tự";
            return false;
        } else {
            document.getElementById("fullnameError").innerText = "";
        }

 
        if (!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
            document.getElementById("emailError").innerText = "Định dạng email không hợp lệ";
            return false;
        } else {
            document.getElementById("emailError").innerText = "";
        }

        if (!phone.match(/^0[0-9]{9}$/)) {
            document.getElementById("phoneError").innerText = "Số điện thoại không hợp lệ";
            return false;
        } else {
            document.getElementById("phoneError").innerText = "";
        }

  
        if (!address.match(/^[\p{L}0-9\s,'-]+$/u) || address.length > 255) {
            document.getElementById("addressError").innerText = "Định dạng địa chỉ không hợp lệ";
            return false;
        } else {
            document.getElementById("addressError").innerText = "";
        }


        if (!note.match(/^[\p{L}0-9\s,'-]+$/u)) {
            document.getElementById("noteError").innerText = " Chỉ được chứa bảng chữ cái và chữ số";
            return false;
        } else {
            document.getElementById("noteError").innerText = "";
        }

      
        if (!created_at.match(/^\d{4}-\d{2}-\d{2}$/)) {
            document.getElementById("created_atError").innerText = "Định dạng ngày không hợp lệ (YYYY-MM-DD)";
            return false;
        } else {
            document.getElementById("created_atError").innerText = "";
        }

        if (!payment.match(/^[01]$/)) {
            document.getElementById("paymentError").innerText = "Thanh toán phải là 0 hoặc 1";
            return false;
        } else {
            document.getElementById("paymentError").innerText = "";
        }


        if (!total.match(/^[0-9]{1,10}$/)) {
            document.getElementById("totalError").innerText = "Tổng số phải là số và ít hơn 10 chữ số";
            return false;
        } else {
            document.getElementById("totalError").innerText = "";
        }

    
        if (!item.match(/^[0-9]+$/)) {
            document.getElementById("itemError").innerText = "Item phải là số";
            return false;
        } else {
            document.getElementById("itemError").innerText = "";
        }

     
        if (!payed.match(/^[01]$/)) {
            document.getElementById("payedError").innerText = "Đã thanh toán phải là 0 hoặc 1";
            return false;
        } else {
            document.getElementById("payedError").innerText = "";
        }

     
        if (!active.match(/^[01]$/)) {
            document.getElementById("activeError").innerText = "Hoạt động phải là 0 hoặc 1";
            return false;
        } else {
            document.getElementById("activeError").innerText = "";
        }

  
        if (!user_id.match(/^[0-9]+$/)) {
            document.getElementById("userIdError").innerText = "ID người dùng phải là số";
            return false;
        } else {
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
