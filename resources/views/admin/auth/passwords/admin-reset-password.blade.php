@extends('admin.auth.master')

@section('content')


<div class="ls qs ym alj">
   <div class="ls qw uh">
      <div class="ls uh ym yz ard auf aso cex cxn dcy dly">
         <div class="gs ti ue cwq">
            <div>
               <img class="buz logo-size" src="{{asset('assets/image/logo.png')}}" alt="Your Company">
               <h2 class="lh avm avy awn aws axq cho">{{ __('Update your password') }}</h2>
            </div>
            <div class="kr">
               <div>
                  <form action="{{ route('admin.password.email') }}" method="POST" class="abt">

                    @csrf


                     <div>
                        <label for="email" class="lp avv avz awk axq">{{ __('Email address') }}</label>
                        <div class="kw">
                            <input id="email" name="email" type="email" autocomplete="email" required="" value="{{ old('email') }}" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('email')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                     </div>

                     <div><button type="submit" class="ls ti yz adp ajm ara arl avv awb awk bac bbi bin bot bou bow bpf">{{ __('Send Email') }}</button></div>
                  </form>
               </div>


               <p class="kw avt awk axm"> <a href="{{ route('admin.login') }}" class="awb ayc bla">{{ __('Sign in') }}</a></p>

            </div>
         </div>
      </div>
      <div class="ab ly qx uh cur"><img class="aa af pc ti apz" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1908&amp;q=80" alt=""></div>
   </div>
</div>

@endsection
