<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flat Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<!--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="css/Style.css" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php include('header.php');?>
<div id="about" class="container-fluid">
    <div class="row">
        <h2>Kết quả bán hàng hôm nay</h2>
        <div class="row">
            <div class="col-md-2 col-xl-2 col-sm-12">
                <label style="color: blue">Doanh thu</label><br/>
                <div>
                    <span><span style="color: darkgoldenrod" class="fa-fw fas fa-file-invoice-dollar"></span><span id="count-bill">13</span> Đơn</span><br/>
                    <span style="color: yellow" class="glyphicon glyphicon-usd"></span><span id="amount-bill">2,100,000</span><span>&dstrok;</span>
                </div>
            </div>
            <div style="border-right: groove;border-left: groove" class="col-md-2 col-xl-2 col-sm-12">
                <label style="color: brown">Trả hàng</label><br/>
                <span style="color: brown" class="fa-fw fa fa-reply-all"></span><span>3 Đơn trả hàng</span><br/>
                <span style="color: brown" class="glyphicon glyphicon-remove-sign"></span><span>-300,000&dstrok;</span>

            </div>
            <div class="col-md-2 col-xl-2 col-sm-12">
                <label style="color: red">So với cùng kỳ tháng trước</label><br/>
                <span style="color: red" class="glyphicon glyphicon-circle-arrow-up"></span><span>3%</span>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-grey">
    <div class="row">
        <div id="doanhThuChart" style="height: 370px; width: 100%;"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div id="thongKeChart" style="height: 370px; width: 100%;"></div>
    </div>
</div>

<div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>Một số phản hồi từ khách hàng</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div>
                    <img src="image/customer/minh-quoc.jpg" class="img-circle mb-4" width="300" height="300">
                </div>
                <blockquote class="blockquote">Sách là nguồn tri thức vô hạn!
                    <footer class="blockquote-footer">Phạm Minh Quốc - <cite title="Source Title">Trưởng ban thuật toán CLB ITPTIT</cite></footer>
                </blockquote>
            </div>
            <div class="item">
                <div>
                    <img src="image/customer/viet-linh.jpg" class="img-circle mb-4" width="300" height="300">
                </div>
                <blockquote class="blockquote">Thật không thể tin nổi!
                    <footer class="blockquote-footer">Lê Viết Linh - <cite title="Source Title">Thừa kế tập đoàn Sun
                        Group</cite></footer>
                </blockquote>
            </div>
            <div class="item">
                <div>
                    <img src="image/customer/huy-dong.jpg" class="img-circle mb-4" width="300" height="300">
                </div>
                <blockquote class="blockquote">Sách đã thay đổi cuộc đời tôi!
                    <footer class="blockquote-footer">Nguyễn Huy Đông - <cite title="Source Title">Chủ tịch Vĩnh
                        Phúc</cite>
                    </footer>
                </blockquote>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
    window.onload = function () {
        jQuery.ajaxSetup({async:false});
        fromDate = new Date();
        fromDate = fromDateToYMD(fromDate);
        toDate = new Date();
        toDate = toDateToYMD(toDate);
        $.get('../lib/controller.php?q=report', {
            key: '',
            status: 0,
            fromDate: fromDate,
            toDate: toDate,
            page: 1,
            perpage: 100000
        }, function (data) {
            $('#count-bill').html(data[0].sum);
            $('#amount-bill').html(formatNumber(data[0].totalAmount));
        });

        var resultArray = [];
        for(let i = 1;i <= 12; i++) {
            fromDate = new Date();
            fromDate.setDate(1);
            fromDate.setMonth(i - 1);
            fromDate = fromDateToYMD(fromDate);
            toDate = new Date();
            toDate.setDate(29);
            toDate.setMonth(i - 1);
            toDate = toDateToYMD(toDate);
            $.get('../lib/controller.php?q=report', {
                key: '',
                status: 0,
                fromDate: fromDate,
                toDate: toDate,
                page: 1,
                perpage: 100000
            }, function (data) {
                resultArray[i] = (data[0].totalAmount == null) ? 0 : data[0].totalAmount;
            });
        }
        
        var doanhThuChart = new CanvasJS.Chart("doanhThuChart", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true
            title:{
                text: "Doanh thu năm 2020"
            },
            data: [
                {
                    // Change type to "bar", "area", "spline", "pie",etc.
                    type: "line",
                    dataPoints: [
                        { label: "Tháng 1",  y: resultArray[1]  },
                        { label: "Tháng 2",  y: resultArray[2]  },
                        { label: "Tháng 3",  y: resultArray[3]  },
                        { label: "Tháng 4",  y: resultArray[4] },
                        { label: "Tháng 5",  y: resultArray[5]  },
                        { label: "Tháng 6",  y: resultArray[6]  },
                        { label: "Tháng 7",  y: resultArray[7] },
                        { label: "Tháng 8",  y: resultArray[8]  },
                        { label: "Tháng 9",  y: resultArray[9]  },
                        { label: "Tháng 10",  y: resultArray[10]  },
                        { label: "Tháng 11",  y: resultArray[11]  },
                        { label: "Tháng 12",  y: resultArray[12]  },

                    ]
                }
            ]
        });
        doanhThuChart.render();

        $.get('../lib/controller.php?q=top-customer', {
        }, function (data) {
            console.log(data);
            var thongKeChart = new CanvasJS.Chart("thongKeChart", {
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: true, // change to true
                title:{
                    text: "TOP 5 Khách hàng tiềm năng"
                },
                data: [
                    {
                        // Change type to "bar", "area", "spline", "pie",etc.
                        type: "bar",
                        dataPoints: [
                            { label: data[0].fullname,  y: data[0].totalAmount  },
                            { label: data[1].fullname,  y: data[1].totalAmount  },
                            { label: data[2].fullname,  y: data[2].totalAmount  },
                            { label: data[3].fullname,  y: data[3].totalAmount  },
                            { label: data[4].fullname,  y: data[4].totalAmount  },
                        ]
                    }
                ]
            });
            thongKeChart.render();
        });
    }
</script>
</body>
</html>
<?php include('footer.php'); ?>