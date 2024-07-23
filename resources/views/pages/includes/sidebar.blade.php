
<div class="sidebar">
   
    <ul class="nav flex-column">
        
       
        <li class="has-sub nav-list">
            <a href="#"><i class="fa-solid fa-list"></i> <span class="sidebar-text"> Income and Expense Management</span> <i
                    class="fa-solid fa-angle-down"></i></a>
            <ul class="sub-menu">
                <li><a href="{{ url('record') }}"><i class="fa-solid fa-plus"></i><span class="sidebar-text">Create income/expense record
                </span></a></li>
                <li><a href="{{ url('view-records') }}"><i class="fa-solid fa-list"></i><span class="sidebar-text"> View all records</span></a></li>
                <li>
                <li><a href="{{ url('category') }}"><i class="fa-solid fa-plus"></i><span class="sidebar-text"> Add Category</span></a></li>
                <li>    
            </ul>
        </li>
        
        <li class="nav-list">
            <a href="{{ url('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> <span class="sidebar-text"> Logout</span></a>
        </li>
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hasSubItems = document.querySelectorAll('.has-sub');

        hasSubItems.forEach(item => {
            item.addEventListener('click', function () {
                // Toggle the active class for the clicked item
                this.classList.toggle('active');

                // Close all other open submenus
                hasSubItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('active')) {
                        otherItem.classList.remove('active');
                    }
                });
            });
        });
    });
</script>