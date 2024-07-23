
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Budget Tracker</title>

</head>

<body>
    <div class="dashboard">

        
        @include('pages.includes.dashboard-header')
        <div class="right-section">
            @include('pages.includes.sidebar')


            <div class="inner-section container">


                <div class="dashboard-home">
                    <div class="welcome">
                        <h2>Welcome <span class="admin-name">{{Auth::user()->name}}</span></h2>
                    </div>
                    <div class="boxes">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="box box1">
                                    <div class="icon">
                                        <i class="fa-solid fa-users"></i>
                                    </div>
                                    <div class="text">
                                        <h3>Income</h3>
                                        <p class="count">{{$total_income}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="box box2">
                                    <div class="icon"><i class="fa-solid fa-address-card"></i></div>
                                    <div class="text">
                                        <h3>Expenses</h3>
                                        <p class="count">{{$total_expense}}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6">
                                <div class="box box3">
                                    <div class="icon">
                                        <i class="fa-solid fa-circle-user"></i>
                                    </div>
                                    <div class="text">
                                        <h3>Balance</h3>
                                        <p class="count">{{$total_balance}}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3 col-md-6">
                                <div class="box box4">
                                    <div class="icon">
                                        <i class="fa-solid fa-school-circle-check"></i>
                                    </div>
                                    <div class="text">
                                        <h3>Jobs</h3>
                                        <p class="count">1260</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    
                </div>



                @include('pages.includes.footer')
            </div>
        </div>
    </div>


    <script>
      







        $(document).ready(function () {
            $(".search").keyup(function () {
                var searchTerm = $(".search").val();
                var listItem = $('.results tbody').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

                $.extend($.expr[':'], {
                    'containsi': function (elem, i, match, array) {
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                    }
                });

                $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'false');
                });

                $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
                    $(this).attr('visible', 'true');
                });

                var jobCount = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(jobCount + ' item');

                if (jobCount == '0') { $('.no-result').show(); }
                else { $('.no-result').hide(); }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>