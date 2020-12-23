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
    // chart
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    // datepicker
    <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    // css custom
    <link rel="stylesheet" href="./css/Style.css" type="text/css">
    <link rel="stylesheet" href="./css/Bill.css" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php include('header.php');?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div id="dauSachChart" style="height: 370px; width: 100%;"></div>
        </div>

        </div>
        <div class="col-sm-12 col-md-12 col-xl-12" style="text-align:center;margin-top:30px">
            <div id="doanhThuChart" style="height: 370px; width: 100%;"></div>
        </div>

    </div>
</div>

<?php include('footer.php')?>

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

        window.onload = function () {
            jQuery.ajaxSetup({async:false});

            $.get('../lib/controller.php?q=top-item', {
                }, function (data) {
                    console.log(data);

                    var dauSachChart = new CanvasJS.Chart("dauSachChart", {
                        theme: "light1", // "light2", "dark1", "dark2"
                        animationEnabled: true, // change to true
                        title:{
                            text: "Thống kê sản phẩm theo số lượng bán ra"
                        },
                        data: [
                            {
                                // Change type to "bar", "area", "spline", "pie",etc.
                                type: "pie",
                                dataPoints: [
                                    { label: data[0].name,  y: data[0].amountItem },
                                    { label: data[1].name,  y: data[1].amountItem },
                                    { label: data[2].name,  y: data[2].amountItem },
                                    { label: data[3].name,  y: data[3].amountItem },
                                    { label: data[4].name,  y: data[4].amountItem },
                                    { label: data[5].name,  y: data[5].amountItem },
                                    { label: data[6].name,  y: data[6].amountItem },
                                    { label: data[7].name,  y: data[7].amountItem },
                                    { label: data[8].name,  y: data[8].amountItem },
                                ]
                            }
                        ]
                    });
                    dauSachChart.render();
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
                    text: "Doanh các tháng năm 2020"
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
        }
    })
</script>
</body>
</html>
