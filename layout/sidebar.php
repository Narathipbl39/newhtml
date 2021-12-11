<div id="navigation" class="collapse navbar-collapse flex-column">
    <div class="profile-section pt-3 pt-lg-0">
        <img class="profile-image mb-3 rounded-circle mx-auto" src="assets/images/profile2.jpg" alt="image">

        <div class="bio mb-3"><h5>ตรวจสอบวันเวลาให้ถูกต้องก่อนจองทุกครั้ง--!!</h5><br></div>
        <!--//bio-->
        <!--//social-list-->
        <hr>
    </div>
    <!--//profile-section-->

    <ul class="navbar-nav flex-column text-left">
        <li class="nav-item active">
            <a class="nav-link" href="<?= WEBSITE_URL ?>"><i class="fas fa-home fa-fw mr-2"></i>หน้าแรก <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= WEBSITE_URL ?>ticket-me.php"><i class="fas fa-bookmark fa-fw mr-2"></i>ตั๋วของฉัน</a>
        </li>
    </ul>

    <div class="my-2 my-md-3">
        <a class="btn btn-primary" href="<?= WEBSITE_URL ?>module/AppAuthen.php?method=Logout">ออกจากระบบ</a>
    </div>
</div>