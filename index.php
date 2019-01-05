<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
  <link rel="stylesheet" href="assets/style/index.css">
</head>

<body>
  <div id="app">
    <section v-if="errored" class="section">
      <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
    </section>

    <section v-else class="section">
      <div v-if="loading">Loading...</div>

      <div v-else id="items_container" class="">
        <div v-for="item in items" class="message is-info">
          <div class="message-header">
            <h2 class="is-size-3">{{item.title}}</h2>
            <button class="delete" @click="removeElement(item.id)"></button>
          </div>
          <div class="message-body">
            {{item.steps}}
          </div>
        </div>
      </div>

      <a class="box addButton" @click="popin = true">+</a>


    </section>

    <div class="pop" v-if="popin">
      <div class="pop_container">
        <button class="delete" @click="popin = false"></button>
        <h2 class="is-size-3">Add receipts</h2>
        <form class="" action="index.html" method="post">
          <label for="" class="is-size-5">Title</label>
          <input type="text" id="title" required>
          <label for="" class="is-size-5">Steps</label>
          <textarea id="steps" rows="8" required></textarea>
          <p v-if="alertMessage" style="color:red; margin: 0 0 20px 0">Please fill all inputs</p>
          <button type="button" @click="addElement()">SEND</button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="assets/js/main.js" charset="utf-8"></script>
</body>

</html>