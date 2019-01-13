<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style/index.css">
</head>

<body>
  <header>
    <h1 class="pacifico">MyReceipts</h1>
  </header>

  <div id="app">

    <div class="columns">
      <div class="column">
        <section v-if="errored" class="section">
          <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else class="section">
          <div v-if="loading">Loading...</div>

          <div v-else id="items_container" class="">
            <div v-for="item in items" class="message is-info">
              <div class="message-header">
                <h2 class="is-size-3 pacifico">{{item.title}}</h2>
                <div class="">
                  <a @click="openModificationPopin(item.id,item.title,item.steps)"><i class="fas fa-edit"></i></a>
                  <button class="delete" @click="removeElement(item.id)"></button>
                </div>
              </div>
              <div class="message-body">
                {{item.steps}}
              </div>
            </div>
          </div>

        </section>
      </div>

      <div class="column">
        <section class="section ">
          <div class="addReceipt">
            <form class="" action="index.html" method="post">
              <label for="" class="is-size-4 pacifico primary">Title</label>
              <div v-if="title_value">
                <input type="text" id="title" required :value="title_value">
              </div>
              <div v-else>
                <input type="text" id="title" required>
              </div>

              <label for="" class="is-size-4 pacifico primary">Steps</label>
              <div v-if="steps_value">
                <textarea id="steps" rows="8" required :value="steps_value"></textarea>
              </div>
              <div v-else>
                <textarea id="steps" rows="8" required></textarea>
              </div>

              <p v-if="alertMessage" style="color:red; margin: 0 0 20px 0">Please fill all inputs</p>

              <div v-if="steps_value">
                <button type="button" @click="editElement()">MODIF. RECEIPT</button>
                <a @click="newReceipt()" class="has-text-centered is-block">New Receipt</a>
              </div>
              <div v-else>
                <button type="button" @click="addElement()">NEW RECEIPT</button>
              </div>

            </form>
          </div>

        </section>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="assets/js/main.js" charset="utf-8"></script>
</body>

</html>
