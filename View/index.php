<?php include "header.php"; ?>

<br>
<div class="container mt-5">
    <?php if(isset($_SESSION["message"])): ?>
        <div class="row">
            <?php if($_SESSION["message_type"]=="tabrik"): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["message"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php else : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["message"];?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>


    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div>
                    <h1 class="text-info">
                        Social Media
                    </h1>
                    <h3>
                        سوشال مدیا به شما کمک می‌کند با افرادی که در زندگی‌تان هستند، در ارتباط باشید و آنچه را که می‌خواهید با آنها به اشتراک بگذارید.
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <section class="mt-5">
                <div CLASS="d-lg-flex justify-content-lg-center d-sm-block border-1">
                    <form method="post" action="signIn" class="border-secondary shadow-lg p-5 rounded-3">
                        <div class="form-group">
                            <label for="inputEmail4" class="form-label fs-6">نام کاربری</label>
                            <input name="account-name" type="text" class="form-control" id="inputEmail4" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4" class="form-label fs-6">گذرواژه</label>
                            <input name="password" type="password" class="form-control" id="inputEmail4" required>
                        </div>
                        <div class="form-check">
                            <a href="">
                                <p>رمز عبور خود را فراموش کردید؟</p>
                            </a>
                        </div>

                        <button type="submit" class="w-100 btn btn-success">ورود</button>
                        <div class="w-100 text-center mt-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                ایجاد حساب کاربری
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>

    </div>
    <section>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div>
                            <h5 class="modal-title" id="exampleModalLabel">نام نویسی</h5>
                            <p class="text-secondary">سریع و ایمن</p>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="register_process">
                            <div class="d-flex">
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputEmail4" class="form-label fs-6">نام</label>
                                    <input name="first-name" type="text" class="form-control" id="inputEmail4" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputPassword4" class="form-label fs-6">نام خانوادگی</label>
                                    <input name="last-name" type="text" class="form-control" id="inputPassword4" required>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputEmail4" class="form-label fs-6">نام کاربری</label>
                                    <input name="account-name" type="text" class="form-control" id="inputEmail4" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputPassword4" class="form-label fs-6">شماره همراه</label>
                                    <input name="mobile-number" type="text" class="form-control" id="inputPassword4" required>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="col-12 mt-3">
                                    <label for="inputEmail4" class="form-label fs-6">آدرس ایمیل</label>
                                    <input name="email" type="email" class="form-control" id="inputEmail4" required>
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputPassword4" class="form-label fs-6">گذرواژه</label>
                                    <input name="password" type="password" class="form-control" id="inputEmail4" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-3">
                                    <label for="inputPassword4" class="form-label  fs-6"> تکرار گذرواژه</label>
                                    <input name="confirm-password" type="password" class="form-control" id="inputPassword4" required>
                                </div>
                            </div>

                            <label for="inputPassword4" class="form-label fs-6 mt-4">جنسیت</label>
                            <div class="d-flex border-1 border-secondary rounded px-2 pt-1" >

                                <div class="col-6 rounded-3 form-check border border-1 py-2">
                                    <input name="gender" value="female" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        زن
                                    </label>
                                </div>
                                <div class="col-6 rounded-3 form-check border border-1 py-2">
                                    <input name="gender" value="male" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        مرد
                                    </label>
                                </div>
                            </div>


                            <label for="inputPassword4" class="form-label fs-6 mt-4">تاریخ تولد</label>
                            <div class="col-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text cursor-pointer" id="date1" data-mdpersiandatetimepicker="" data-original-title="" title="">اینجا کلیک کنید</span>
                                    </div>
                                    <input name="date-of-birth" type="text" id="inputDate1" class="form-control" placeholder="تاریخ تولد" aria-label="date1" aria-describedby="date1">
                                </div>
                            </div>

                            <div class="d-flex mt-4 mb-3">
                                <div class="col">
                                    <label for="files" class="btn fs-6">افزودن تصویر</label>
                                    <input type="file" name="image" id="image" class="form-control" aria-label="Last name">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>


<script type="text/javascript">
    $('#date1').MdPersianDateTimePicker({
        targetTextSelector: '#inputDate1',
        dateFormat: 'yyyy-MM-dd',

    });

</script>
<?php include "footer.php"; ?>
