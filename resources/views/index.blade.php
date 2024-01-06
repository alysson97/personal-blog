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
    <div class="row col-8 py-4">
      <textarea name="Post" id="" cols="5" rows="5" placeholder="Write here..."></textarea>
      <input type="file" name="image" id="">
      <button class="col-2">Post</button>
    </div>
    <div class="card row col-8 p-3" style="background-color: #ffffff2a">
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
        <button>like</button> <button>dislike</button>
      </div>
    </div>
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

@stop