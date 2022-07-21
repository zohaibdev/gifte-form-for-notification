<section class="gifte-form-block">
    <div class="container">
        <form id="gifte-form" data-action="<?php echo admin_url('admin-ajax.php'); ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box">
                        <h2>Tell us who's Birthday, Anniversary, or Special Occasion you don't want to miss</h2>
                        <h3>Is it your Mother? Your Son? You and your spouse's anniversary? Please use the below section let us know the name of the special individual in your life and the important date or occasion that you don't want to miss. We'll send you
                            a text two week before the date. A few clicks and your gift will be on it's way!
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" aria-label="First name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" aria-label="Last name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="relationship">Relationship</label>
                        <select id="relationship" name="relationship" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>Mother</option>
                            <option>Father</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="occasion_type">Occasion Type</label>
                        <select id="occasion_type" name="occasion_type" class="form-select" required>
                            <option selected>Choose...</option>
                            <option>Birthday</option>
                            <option>Aniversary</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label for="occasion_type">Occasion Date</label>
                        <input id="occasion_date" name="occasion_date" class="form-control" type="date"  required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="price_range">What is your preferred price range</label>
                        <select id="price_range" name="price_range" class="form-select" required>
                            <option selected>Choose...</option>
                            <option value="$100">$100</option>
                            <option value="$200">$200</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-block">
                        <label for="startDate">What sort of gifts would you be interested in giving to your loved one for
                            this occasion? Please check all that apply.</label>
                        <div class="form-sle">
                            <input class="form-block-input" type="checkbox" id="flexCheckChecked" />
                            <label class="form-block-label" for="flexCheckChecked">Gift</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="action">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>