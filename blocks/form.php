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
                            <option disabled selected>Choose...</option>
                            <option>Mother</option>
                            <option>Father</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="occasion_type">Occasion Type</label>
                        <select id="occasion_type" name="occasion_type" class="form-select" required>
                            <option disabled selected>Choose...</option>
                            <option>Birthday</option>
                            <option>Aniversary</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label for="occasion_type">Occasion Date</label>
                        <input id="occasion_date" name="occasion_date" class="form-control" type="date" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-block">
                        <label class="form-label" for="price_range">What is your preferred price range</label>
                        <select id="price_range" name="price_range" class="form-select" required>
                            <option disabled selected>Choose...</option>
                            <option value="Under $50">Under $50</option>
                            <option value="$50-$75">$50-$75</option>
                            <option value="$75-$100">$75-$100</option>
                            <option value="$100-$150">$100-$150</option>
                            <option value="Over $150">Over $150</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-block">
                        <label for="startDate">What sort of gifts would you be interested in giving to your loved one for
                            this occasion? Please check all that apply.</label>
                        <div class="checkbox-list">

                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_1" value="Candles & Bathing Products" required />
                                <label class="form-block-label" for="gifts_1">Candles & Bathing Products</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_2" value="Chocolate / Sweets" required />
                                <label class="form-block-label" for="gifts_2">Chocolate / Sweets</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_3" value="Craft Beer" required />
                                <label class="form-block-label" for="gifts_3">Craft Beer</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_4" value="Coffee / Tea" required />
                                <label class="form-block-label" for="gifts_4">Coffee / Tea</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_5" value="Flowers" />
                                <label class="form-block-label" for="gifts_5">Flowers</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_6" value="Gourmet Salt / Cooking Spices" required />
                                <label class="form-block-label" for="gifts_6">Gourmet Salt / Cooking Spices</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_7" value="Gourmet Smoked Meats / Bacon" required />
                                <label class="form-block-label" for="gifts_7">Gourmet Smoked Meats / Bacon</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_8" value="Houseplant" required />
                                <label class="form-block-label" for="gifts_8">Houseplant</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_9" value="Gourmet Condiments, Hot Sauces & Salsas" required />
                                <label class="form-block-label" for="gifts_9">Gourmet Condiments, Hot Sauces & Salsas</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_10" value="Liquor" required />
                                <label class="form-block-label" for="gifts_10">Liquor</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_11" value="Maple Syrup / Jams" required />
                                <label class="form-block-label" for="gifts_11">Maple Syrup / Jams</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_12" value="Salty Snack / Popcorn" required />
                                <label class="form-block-label" for="gifts_12">Salty Snack / Popcorn</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_13" value="Wine" required />
                                <label class="form-block-label" for="gifts_13">Wine</label>
                            </div>
                            <div class="form-sle">
                                <input class="form-block-input" type="checkbox" name="gifts" id="gifts_14" value="Other" required />
                                <label class="form-block-label" for="gifts_15">Other</label>
                            </div>
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