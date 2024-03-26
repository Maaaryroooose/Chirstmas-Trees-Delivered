<!-- Add Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="add_order.php">
                    <div class="form-group">
                        <label for="orderEmail">Email:</label>
                        <input type="email" class="form-control" id="orderEmail" name="orderEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="orderFirstName">First Name:</label>
                        <input type="text" class="form-control" id="orderFirstName" name="orderFirstName" required>
                    </div>
                    <div class="form-group">
                        <label for="orderLastName">Last Name:</label>
                        <input type="text" class="form-control" id="orderLastName" name="orderLastName" required>
                    </div>
                    <div class="form-group">
                        <label for="orderCity">City/Town:</label>
                        <input type="text" class="form-control" id="orderCity" name="orderCity" required>
                    </div>
                    <div class="form-group">
                        <label for="orderAddress">Address:</label>
                        <textarea class="form-control" id="orderAddress" name="orderAddress" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="orderPhone">Phone:</label>
                        <input type="text" class="form-control" id="orderPhone" name="orderPhone" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
