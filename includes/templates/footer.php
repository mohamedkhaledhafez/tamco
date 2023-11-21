<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        <?php echo date("Y") ?> &copy; Copyright <strong><span>Tamco</span></strong>. All Rights Reserved
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo $vendor ?>quill/quill.min.js"></script>
<script src="<?php echo $vendor ?>simple-datatables/simple-datatables.js"></script>
<script src="<?php echo $vendor ?>tinymce/tinymce.min.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo $js ?>main.js"></script>

<!-- Sweetalert -->
<script src="<?php echo $js ?>sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK",
        });
    </script>
<?php
    unset($_SESSION['status']);
}

?>
</body>

</html>