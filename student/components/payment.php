<div class="col-12">
    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title">Fill the form and proceed to pay
            </h4>
            <div class="general-label">
                <form class="mb-0" action="#" method="post">

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bmd-label-floating ">Student Name</label>
                        <input type="text" class="form-control"
                        value="<?php echo $_SESSION['student_name'] ?>"
                        disabled> 
                    </div> 

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bmd-label-floating ">Student Email address</label>
                        <input type="email" class="form-control"
                        value="<?php echo $_SESSION['student_email'] ?>"
                        disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bmd-label-floating ">Student Phone Number</label>
                        <input class="form-control" type="text" onkeypress="return isNumberKey(event)" maxlength="10"
                        minlength="8"  name="student_phone_number" required> 
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="bmd-label-floating ">Parent Phone Number</label>
                        <input class="form-control" type="text" onkeypress="return isNumberKey(event)" maxlength="10"
                        minlength="8"  name="parent_phone_number" required> 
                    </div>

                    <?php
                        $oid = 'OID'.rand(10, 1000000).'END' ;
                    ?>

                    <!-- data-order_id="<?php echo $oid ;?>" -->

                    <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="<?php echo $data_key?>"
                    data-amount="<?php echo $list_package['price'] * 100 ?>"
                    data-currency="INR"
                    
                    data-buttontext="Proceed to Pay"
                    data-name="<?php echo $list_package['package_name'] ?>"
                    data-prefill.name="<?php echo $_SESSION['student_name'] ?>"
                    data-prefill.email="<?php echo $_SESSION['student_email'] ?>"
                    data-theme.color="#4558BE"
                    
                    ></script>

                    <script>
                        var btn = document.querySelector('.razorpay-payment-button') ;
                        btn.classList.add('btn', 'btn-success', 'btn-raised');

                        
                    </script>


                </form>
            </div>
        </div>
    </div>
</div> <!-- end col -->