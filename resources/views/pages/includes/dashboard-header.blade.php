@php
use Illuminate\Support\Facades\Auth;
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/job-posting.css') }}">
<link rel="stylesheet" href="{{ asset('css/employers-table.css') }}">
<link rel="stylesheet" href="{{ asset('css/candidate.css') }}">



<header>
    <div class="header-logo">
        <h2> <a href="{{url('/dashboard');}}"><i class="fa-solid fa-desktop"></i> <span class="sidebar-text"> PBT
                </span></a></h2>
    </div>



    <div class="dashboard-header">
        <div class="left-side">
            <div class="menu" onclick="sidebarClose();">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="title">
                <h3>Dashboard</h3>
            </div>
        </div>
        <div class="right-side">
            <div class="profile me-3">
                <div class="image">
                    <img src="{{  asset('../images/profile.jpg') }}" alt="">
                </div>
                <div class="admin-name">
                    <!-- <h4>Admin</h4> -->
                    <span>{{Auth::user()->name}}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function sidebarClose() {
        document.querySelector(".sidebar").classList.toggle("open");
        document.querySelector(".header-logo").classList.toggle("open1");
        document.querySelector(".right-section").classList.toggle("active");

        // Toggle the menu icon
        const menuIcon = document.querySelector(".menu i");
        if (menuIcon.classList.contains("fa-bars")) {
            menuIcon.classList.remove("fa-bars");
            menuIcon.classList.add("fa-arrow-right");
        } else {
            menuIcon.classList.remove("fa-arrow-right");
            menuIcon.classList.add("fa-bars");
        }
    }



</script>

<style>
    header {
        display: flex;
        background-color: #4885ED;
        position: sticky;
        top: 0;
        z-index: 99999999;

    }

    header::before {
        content: "";
        background-color: black;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0.2;
    }

    header .header-logo {
        position: relative;
        background-color: #4885ED;
        width: 32.4%;
        padding: 10px 20px;
        transition: all 0.2s ease;
        display: flex;
        justify-content: center;
        align-items: center;

    }
    header .header-logo h2{
        position: relative;
    }

    header .header-logo::before {
        content: "";
        background-color: black;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0.2;
    }

    header .header-logo.open1 {
        width: 83px;

    }

    header .header-logo.open1 h2 .sidebar-text {
        display: none;
    }

    header .header-logo h2 a {
        text-decoration: none;
        color: white;
    }
</style>