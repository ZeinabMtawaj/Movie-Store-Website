{{-- <div id="half-stars-example">
    <div class="rating-group">
        <input class="rating__input rating__input--none" checked name="rating2" id="rating2-0" value="0" type="radio">
        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
        <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-05" value="0.5" type="radio">
        <label aria-label="1 star" class="rating__label" for="rating2-10"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-10" value="1" type="radio">
        <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-15" value="1.5" type="radio">
        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-20" value="2" type="radio">
        <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-25" value="2.5" type="radio" checked>
        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-30" value="3" type="radio">
        <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-35" value="3.5" type="radio">
        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-40" value="4" type="radio">
        <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i class="rating__icon rating__icon--star fa fa-star-half"></i></label>
        <input class="rating__input" name="rating2" id="rating2-45" value="4.5" type="radio">
        <label aria-label="5 stars" class="rating__label" for="rating2-50"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
        <input class="rating__input" name="rating2" id="rating2-50" value="5" type="radio">
    </div>
  <p class="desc" style="margin-bottom: 2rem; font-family: sans-serif; font-size:0.9rem">Half stars<br/>
    Space on left side to select 0 stars</p>
</div>

<script>
    function postToController() {
        for (i = 0; i < document.getElementsByName('rating').length; i++) {
                if(document.getElementsByName('rating')[i].checked == true) {
                    var ratingValue = document.getElementsByName('rating')[i].value;
                    break;
                }
        }
        alert(ratingValue);
}
    </script> --}}

















 {{-- <div class="star-widget">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="#">
          <header></header>
          <div class="btn">
            <button type="submit">Post</button>
          </div>
        </form>
      </div>
    <script>
      const btn = document.querySelector("button");
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{
        widget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = ()=>{
          widget.style.display = "block";
          post.style.display = "none";
        }
        return false;
      }
    </script> --}}








{{-- 
<div class="container">  
  <div class="demo">
    <div class="ratingControl">
        <input type="radio" id="rating-5" name="rating" value="5">
        <label class="ratingControl-stars ratingControl-stars--5" for="rating-5">5</label>
        <input type="radio" id="rating-45" name="rating" value="4.5">
        <label class="ratingControl-stars ratingControl-stars--45 ratingControl-stars--half" for="rating-45">45</label>
        <input type="radio" id="rating-4" name="rating" value="4">
        <label class="ratingControl-stars ratingControl-stars--4" for="rating-4">4</label>
        <input type="radio" id="rating-35" name="rating" value="3.5">
        <label class="ratingControl-stars ratingControl-stars--35 ratingControl-stars--half" for="rating-35">35</label>
        <input type="radio" id="rating-3" name="rating" value="3">
        <label class="ratingControl-stars ratingControl-stars--3" for="rating-3">3</label>
        <input type="radio" id="rating-25" name="rating" value="2.5">
        <label class="ratingControl-stars ratingControl-stars--25 ratingControl-stars--half" for="rating-25">25</label>
        <input type="radio" id="rating-2" name="rating" value="2">
        <label class="ratingControl-stars ratingControl-stars--2" for="rating-2">2</label>
        <input type="radio" id="rating-15" name="rating" value="1.5">
        <label class="ratingControl-stars ratingControl-stars--15 ratingControl-stars--half" for="rating-15">15</label>
        <input type="radio" id="rating-1" name="rating" value="1">
        <label class="ratingControl-stars ratingControl-stars--1" for="rating-1">1</label>
        <input type="radio" id="rating-05" name="rating" value="0.5">
        <label class="ratingControl-stars ratingControl-stars--05 ratingControl-stars--half" for="rating-05">05</label>
        
    </div>
  </div>
</div> --}}











<!--

I was in seek of a star rating system that used radio inputs for accessibility fallbacks and through some trial and error as well as the very robust solution by James Barnett I was able to 

Exploring many solutions:
fork of https://codepen.io/jamesbarnett/pen/vlpkh
http://lea.verou.me/2011/08/accessible-star-rating-widget-with-pure-css/
http://www.yuiblog.com/blog/2010/08/24/developing-an-accessible-star-ratings-widget/
https://css-tricks.com/star-ratings/
-->
<h1>Half Star Rating</h1>
<fieldset class="rate">
    <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
    <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
    <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
    <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
    <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
    <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
    <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
    <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
    <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
    <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
    <form action="#">
      <header></header>
      <div class="btn">
        <button type="submit">Post</button>
      </div>
    </form>

</fieldset>