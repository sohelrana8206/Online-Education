@can('live-chat')
<div class="live-chat">
    <a href="{{url('ChatRoom')}}" target="_blank">
        <img width="50px" src="{{asset('public/admin-assets/images/chat.png')}}">
    </a>
</div>

@endcan

</div>
<!-- /page content -->

</div>
<!-- /page container -->

@isset($ckeditor)
<script src="{{asset('public/admin-assets/js/'.$ckeditor)}}"></script>
@endisset

</body>
</html>
