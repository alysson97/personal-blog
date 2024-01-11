@extends('header.header')

@section('title', 'blog')



@section('body')
<main class="row" >
  <div class="comunitys col-2">
    <table class="table table-hover">
      <tr class="d-flex flex-column ">
        <td>Mad-Devs</td>
        <td>Disclaimers</td>
        <td>Incels</td>
        <td>Boomers</td>
      </tr>
    </table>
  </div>

  <!--Posts-->
  <div class="post-wall col-8 container d-flex flex-column justify-content-center align-items-center">

    <form class="row col-8 pb-4" action="/create-post/{{$user->id}}" method="POST">
      @csrf
      <input type="text" class="mb-2" name="postTitle" id="postTitle" placeholder="title">
      <textarea class="mb-2" name="message" id="message" cols="5" rows="5" placeholder="Write here..." style="resize: none;"></textarea>
      <input class="mb-1" type="file" name="image" id="post-image">
      <button class="col-2 my-1">Post</button>
    </form>

    <div class="card row col-8 p-3 mb-3" style="background-color: #ffffff2a">
      <div class="row d-flex justify-between">
        <img src="desorganizado.png" alt="" class="border-radius col-2" style="">
        <h3 class="col-10">Title</h3>
      </div>
      <div class="row">
        <p class="content">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ullam quibusdam incidunt maiores quo placeat aspernatur reprehenderit perferendis! Ratione consequatur sapiente obcaecati et magnam asperiores tempore exercitationem aliquam odit nostrum.
        </p>
      </div>
      <div class="row">
        <p>comments</p>
        <button class="col-1">like</button>
        <button class="col-2">dislike</button> 
      </div>
    </div>


    
    @for ($i = 0; $i < (sizeof($fetchData)-(sizeof($fetchData)-$postQtd)); $i++)
      <div class="card row col-8 p-3 mb-3" style="background-color: #ffffff2a">
        <div class="row d-flex justify-between">
          <img src="desorganizado.png" alt="" class="border-radius col-2" style="">
          <h3 class="col-10">{{$fetchData[$i]->title}}</h3>
        </div>
        <div class="row">
          <p class="content">
            {{$fetchData[$i]->message}}
          </p>
        </div>
        <div class="row">
          <p>comments</p>
          <button class="col-1">like</button>
          <button class="col-2">dislike</button> 
        </div>
      </div>
    @endfor

  </div>
  

  <div class="friends col-2">
    <table class="table table-hover">
      <tr class="d-flex flex-column ">
        <td>Lara</td>
        <td>Lua</td>
        <td>Math</td>
        <td>Tai</td>
      </th>
    </table>
  </div>
</main>

<!--working-->
<script>
  var postQtd = {{$postQtd}};
  var windowHeight = window.innerHeight;

  //working
  window.addEventListener('scroll',()=>{
    if(windowHeight + window.scrollY >= document.body.offsetHeight){
    console.log("maxScroll");
    }
    console.log(window.innerHeight, window.scrollY, document.body.offsetHeight);
  });

  
  


  console.log(postQtd);
  /* const repeatTimeOut = setTimeout(() => {
    postQtd++;
    if(postQtd >= {{sizeof($fetchData)}}) clearTimeOut(repeatTimeOut);
    console.log(postQtd);
  }, 2000); */


</script>
@stop