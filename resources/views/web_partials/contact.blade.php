<section id="contact" class="contact_section sec_ptb_120 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            <div class="col-lg-3 col-md-8 col-sm-10">
                <div class="contact_info ul_li_block">
                    <h3 class="list_title">Office Address</h3>
                    <ul class="clearfix">
                        <li>{{$comprof->address}}</li>
                    </ul>
                </div>

                <div class="contact_info ul_li_block">
                    <h3 class="list_title">Contact Info</h3>
                    <ul class="clearfix">
                        @foreach ($contact as $cont)
                        <li><span>{{$cont->name}}:</span> {{$cont->value}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-10">
                <h2 class="text-white mb-3">Review</h2>
                <div class="contact_form">
                    <form action="javascript:void(0)" id="form-riview">
                        <div class="form_item">
                            <input type="text" name="name" id="name" placeholder="Your Name" required>
                        </div>

                        <div class="form_item">
                            <textarea name="message" id="message" placeholder="Enter Your Message..." required></textarea>
                        </div>
                        
                        <div class="form_item">
                            <div class='rating-stars'>
                                <ul id='stars'>
                                  <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                  <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                  </li>
                                </ul>
                              </div>
                              <input type="hidden" id="rating_counter" value="0">
                        </div>
                        
                        <div class="form_item">
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="image" accept="image/*">
                                <label id="image-text" class="custom-file-label" for="image">Choose image</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn_border">Send Review</button>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>