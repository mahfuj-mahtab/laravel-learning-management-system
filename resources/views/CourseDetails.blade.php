@include('header')

<div>
    @if ($is_enrolled)
    <a href="/profile">Finish Course</a>
    @else
    <section>
      <div class="product">
        <img src="https://i.imgur.com/EHyR2nP.png" alt="The cover of Stubborn Attachments" />
        <div class="description">
          <h3>Stubborn Attachments</h3>
          <h5>$20.00</h5>
        </div>
      </div>
      <form action="/checkout" method="POST">
        @csrf
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
    <!-- <form action="/checkout" method="POST">
        @csrf
        <button>Enroll</button>
    </form> -->
    <!-- <form action="/profile/course/{{$course->id}}/enroll/" method="POST">
        @csrf
        <button>Enroll</button>
    </form> -->
    @endif
</div>
@include('footer')