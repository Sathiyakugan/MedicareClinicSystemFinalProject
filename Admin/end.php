<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>

<?php include '../controllers/base/AfterBodyJS.php' ?>
<?php include 'GetNotifications.php' ?>
<script>
    $('.modalEditarUsuario').click(function(){
        var ID=$(this).attr('data-a');
        $.ajax({url:""+ID,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


<script>
    function changepassword(val) {
        console.log(val);
        $.ajax({
            url: "" + val, cache: false, success: function (result) {
                $(".modal-content").html(result);
            }
        });

        $('#editarUsuario').modal('show');
    }

</script>