@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    <div id="app">
            <!--<matches-component></matches-component>-->
            <example-component></example-component>
            <!--<modal-component></modal-component>-->
            <!--<hooper-component></hooper-component>-->
            <!--① モーダル表示ボタン -->
            <button v-on:click="showModal" class="p-btn">モーダル表示ボタン</button>

            <!--② モーダル -->
            <div v-if="modalVisible" class="l-modal" v-on:click="closeModal">
                <div v-on:click="cancelEvent" class="p-modal">
                    <h2 class="p-modal__title">Vueモーダル</h2> 
                    <p> Hello World!111</p> 

                    <!--モーダルを閉じるボタン -->
                    <div v-on:click="closeModal" class="p-modal__btn--close">×</div>
                </div> 
            </div> 

            <!--③ モーダル表示時の背景色（薄い黒） -->
            <div v-if="modalBgVisible" class="l-modal__bg"></div>
            
            
            <!--① モーダル表示ボタン -->
            <button v-on:click="showModal" class="p-btn">モーダル表示ボタン</button>

            <!--② モーダル -->
            <div v-if="modalVisible" class="l-modal" v-on:click="closeModal">
                <div v-on:click="cancelEvent" class="p-modal">
                    <h2 class="p-modal__title">Vueモーダル</h2> 
                    <p> Hello World!222</p> 

                    <!--モーダルを閉じるボタン -->
                    <div v-on:click="closeModal" class="p-modal__btn--close">×</div>
                </div> 
            </div> 

            <!--③ モーダル表示時の背景色（薄い黒） -->
            <div v-if="modalBgVisible" class="l-modal__bg"></div>

  
@endsection
