<?php 
require __DIR__ . "/config/define.php";
require __DIR__ . "/module/AppUsers.php";
?>



<style>
    body {
        background: #C5E1A5;
    }

    form {
        width: 60%;
        margin: 60px auto;
        background: #efefef;
        padding: 60px 120px 80px 120px;
        text-align: left;
        -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        position: relative;
        margin: 40px 0px;
    }

    .label-txt {
        position: absolute;
        top: -1.6em;
        padding: 10px;
        font-family: sans-serif;
        font-size: .8em;
        letter-spacing: 1px;
        color: rgb(120, 120, 120);
        transition: ease .3s;
    }

    .input {
        width: 40%;
        padding: 10px;
        background: transparent;
        border: none;
        outline: none;
    }

    .line-box {
        position: relative;
        width: 40%;
        height: 2px;
        background: #BCBCBC;
    }

    .line {
        position: absolute;
        width: 0%;
        height: 2px;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        background: #8BC34A;
        transition: ease .6s;
    }

    .input:focus+.line-box .line {
        width: 100%;
    }

    .label-active {
        top: -3em;
    }

    button {
        display: inline-block;
        padding: 12px 24px;
        background: rgb(220, 220, 220);
        font-weight: bold;
        color: rgb(120, 120, 120);
        border: none;
        outline: none;
        border-radius: 3px;
        cursor: pointer;
        transition: ease .3s;
    }

    button:hover {
        position: left;
        background: #8BC34A;
        color: #ffffff;
    }
</style>


<form action="<? WEBSITE_URL ?>module/AppUsers.php?method=AddData" method="post">
    <label>
        <p class="label-txt">ชื่อผู้ใช้งาน</p>
        <input type="text" class="input" name="username">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">รหัสผ่าน</p>
        <input type="text" class="input" name="password">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">ชื่อ</p>
        <input type="text" class="input" name="name">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">นามสกุล</p>
        <input type="text" class="input" name="lastname">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">เลขบัตรประชาชน</p>
        <input type="text" class="input" name="idcard">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">เบอร์โทรติดต่อ</p>
        <input type="text" class="input" name="phone">
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <button name="id" value="<?= $id ?>" id="form-submit" type="submit">ยืนยัน</button>
    <button type="reset">รีเซ็ต</button>
</form>