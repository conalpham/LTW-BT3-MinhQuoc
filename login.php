<html lang="en">
<head>
    <title>Flat Shop</title>
    <link rel="stylesheet" href="admin/css/Login.css" type="text/css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div>
    <div class="form">
        <h1 class="mt-10" style="color: red; text-align: center;font-weight: bold">
            Welcome!
        </h1>
        <div>
            <div class="error"></div>	
            <div class="form-group">
                <div class="row">
                    <label for="username">Tên đăng nhập</label>
                    <input id="username" type="text" required name="username">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label for="password">Mật khẩu</label>
                    <input id="password" type="password" required name="password">
                </div>
            </div>
        </div>
        <button type="submit" id="btnLogin" style="width: 100%;" class="btn btn-primary">Đăng nhập</button>
    </form>
</div>
</body>
</html>
<script src="admin/js/main.js"></script>