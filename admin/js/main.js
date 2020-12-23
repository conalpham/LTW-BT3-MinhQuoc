$('#btnLogin').on('click', function() {
    var username = $('#username').val();
    var password = $('#password').val();
    $.post('lib/controller.php?q=verify', {
            username: username,
            password: password
        },
        function(data) {
            if (data == 1) {
                $('.error').removeClass().addClass('alert alert-success').html('<i class="fa fa-unlock"></i> Đang đăng nhập vào hệ thống...');
                setTimeout(function() {
                    window.location = 'index.php';
                }, 1000);
            } else {
                $('.error').addClass('alert alert-danger').html('Tài khoản hoặc mật khẩu không chính xác!');
                $('#username').val('');
                $('#password').val('');
            }
        });
});

$(document).ready(function() {
    // Add smooth scrolling to all links in navbar + footer link
    $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
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
            }, 900, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    $(window).scroll(function() {
        $(".slideanim").each(function() {
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
        });
    });

    var checkin = $('#fromDate').datepicker({ format: "dd/mm/yyyy" });
    let date = new Date();
    date.setDate(1);
    checkin.data('datepicker').setDate(date);
    checkin.on('changeDate', function(ev) {
        if (ev.date > checkout.viewDate) {
            var newDate = new Date(ev.date)
            checkout.setDate(newDate);
        }
        $('#toDate').datepicker('setStartDate', $('#fromDate').datepicker('getDate'))
        $('#toDate')[0].focus();
    });
    var checkout = $('#toDate').datepicker({ format: "dd/mm/yyyy" }).data('datepicker');
    checkout.setDate(new Date());

});

function searchBill(page = 1) {
    var key = $('#input-key').val();
    // console.log('key: ', key);
    var status = $('#input-status').val();
    // console.log('status: ', status);
    var fromDate = fromDateToYMD($('#fromDate').datepicker('getDate'));
    // console.log('fromDate: ', fromDate);
    var toDate = toDateToYMD($('#toDate').datepicker('getDate'));
    // console.log('toDate: ', toDate);
    $.get('../lib/controller.php?q=search-bill', {
            key: key,
            status: status,
            fromDate: fromDate,
            toDate: toDate,
            page: page,
            perpage: 6
        },
        function(data) {
            var s = ``;
            $('.list-modal').html('');
            $('.table-content').html('');
            for (var i = 0; i < data.length; i++) {
                s = `
                    <tr>
                        <td>` + ((page - 1) * 6 + i + 1) + `</td>
                        <td>HD0` + data[i].idBill + `</td>
                        <td>` + data[i].createdAt + `</td>
                        <td>` + data[i].fullname + `</td>
                        <td>` + data[i].address + `</td>
                        <td style='color: red'>` + data[i].amount + `&dstrok;</td>
                `;
                switch (data[i].currentStatus) {
                    case "1":
                        {
                            s += `
                            <td>
                                <span class="badge label label-primary">Chờ xác nhận</span>
                            </td>
                            `;
                            break;
                        }
                    case "2":
                        {
                            s += `
                            <td>
                                <span class="badge label label-info">Chờ lấy hàng</span>
                            </td>
                            `;
                            break;
                        }
                    case "3":
                        {
                            s += `
                            <td>
                                <span class="badge label label-warning">Đang giao</span>
                            </td>
                            `;
                            break;
                        }
                    case "4":
                        {
                            s += `
                            <td>
                                <span class="badge label label-success">Đã giao hàng</span>
                            </td>
                            `;
                            break;
                        }
                    case "5":
                        {
                            s += `
                            <td>
                                <span class="badge label label-danger">Yêu cầu trả hàng</span>
                            </td>
                            `;
                            break;
                        }
                }
                s += `  
                        <td>
                            <i id='btnDetail' class="glyphicon glyphicon-eye-open" style="color: #0090da; cursor: pointer" title="Xem chi tiết" onclick="getDetail(` + data[i].idBill + `)"></i>
                        </td>
                    </tr>
                `;
                $('.table-content').append(s);
            }

            countBill(page, data.length);
        });
}

function getDetail(idBill) {
    id = '#HD0' + idBill;
    $.get('detailBill.php', { idBill: idBill }, function(data) {
        $('.list-modal').html(data);
        $(id).modal('show');
        init();
    })
}

function countBill(page = 1, totalItem) {
    var key = $('#input-key').val();
    // console.log('key: ', key);
    var status = $('#input-status').val();
    // console.log('status: ', status);
    var fromDate = fromDateToYMD($('#fromDate').datepicker('getDate'));
    // console.log('fromDate: ', fromDate);
    var toDate = toDateToYMD($('#toDate').datepicker('getDate'));
    // console.log('toDate: ', toDate);
    $.get('../lib/controller.php?q=count-bill', {
            key: key,
            status: status,
            fromDate: fromDate,
            toDate: toDate,
            page: 1,
            perpage: 6
        },
        function(data) {
            $('.sum-text').html('Hiển thị ' + totalItem + ' của ' + data);
            var totalPages = Math.ceil(data / 6);
            s = ``;
            for (var i = 1; i <= totalPages; i++) {
                if (i == page) {
                    s += `<a class="active" onclick="searchBill(` + i + `)">` + i + `</a>`;
                } else {
                    s += `<a onclick="searchBill(` + i + `)">` + i + `</a>`;
                }
            }
            $('.pagination').html(s);
        });
}

function fromDateToYMD(date) {
    var d = date.getDate();
    var m = date.getMonth() + 1;
    var y = date.getFullYear();
    return '' + y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d) + ' 00:00:00';
}

function toDateToYMD(date) {
    var d = date.getDate();
    var m = date.getMonth() + 1;
    var y = date.getFullYear();
    return '' + y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d) + ' 23:59:59';
}

function updateBillStatus(id, status) {
    $('#HD0' + id).modal('hide');
    console.log('id: ' + id + ' status: ' + status);
    $.post('../lib/controller.php?q=update-status-bill', {
        idBill: id,
        status: status
    }, function(data) {
        console.log(data);
        setTimeout(function() { searchBill(1) }, 1000);
    });
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

//Timeline

function init() {
    var timeline = document.querySelector(".timeline ol");
    var arrows = document.querySelectorAll(".timeline .arrows .arrow");
    var arrowPrev = document.querySelector(".timeline .arrows .arrow__prev");
    var arrowNext = document.querySelector(".timeline .arrows .arrow__next");
    var firstItem = document.querySelector(".timeline li:first-child");
    var lastItem = document.querySelector(".timeline li:last-child");
    var xScrolling = 60;
    var disabledClass = "disabled";
    animateTl(xScrolling, arrows, timeline);

    // CHECK IF AN ELEMENT IS IN VIEWPORT
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.left >= 215.5 &&
            rect.left <= 384.5
        );
    }

    // SET STATE OF PREV/NEXT ARROWS
    function setBtnState(el, flag = true) {
        if (flag) {
            el.classList.add(disabledClass);
        } else {
            if (el.classList.contains(disabledClass)) {
                el.classList.remove(disabledClass);
            }
            el.disabled = false;
        }
    }

    // ANIMATE TIMELINE
    function animateTl(scrolling, el, tl) {
        let counter = 0;
        for (let i = 0; i < el.length; i++) {
            el[i].addEventListener("click", function() {
                if (!arrowPrev.disabled) {
                    arrowPrev.disabled = true;
                }
                if (!arrowNext.disabled) {
                    arrowNext.disabled = true;
                }

                const sign = (this.classList.contains("arrow__prev")) ? "" : "-";
                if (counter === 0) {
                    tl.style.transform = `translateX(-${scrolling}px)`;
                } else {
                    const tlStyle = getComputedStyle(tl);
                    const tlTransform = tlStyle.getPropertyValue("-webkit-transform") || tlStyle.getPropertyValue("transform");
                    const values = parseInt(tlTransform.split(",")[4]) + parseInt(`${sign}${scrolling}`);
                    tl.style.transform = `translateX(${values}px)`;
                }

                setTimeout(() => {
                    isElementInViewport(firstItem) ? setBtnState(arrowPrev) : setBtnState(arrowPrev, false);
                    isElementInViewport(lastItem) ? setBtnState(arrowNext) : setBtnState(arrowNext, false);
                }, 1100);

                counter++;
            });
        }
    }
}