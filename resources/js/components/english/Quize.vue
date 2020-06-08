<template>
    <div class="search-reslut">
        <span id="content">
            <button @click="JapaneseRandom()" class="quize-btn btn-outline-primary">JapaneseRandom</button>
        </span>
        <span id="content">
            <button @click="EnglishRandom()" class="mb-4 btn-outline-info">EnglishRandom</button>
        </span>
        <span id="content">
            <button @click="Recent()" class="quize-btn btn-outline-success">Recent</button>
        </span>
        <span id="content">
            <button @click="completeList()" class="quize-btn btn-outline-dark">completeList</button>
        </span>
        <span id="content" v-if="showHiddenquize">
            <button @click="hiddenAllAnswer()" class="quize-btn btn-outline-danger">hiddenAnswer</button>
        </span>
        <span id="content" v-if="showquizeCurrent">
            <button @click="hiddenCurrentAllAnswer()" class="quize-btn btn-outline-danger">hiddenAnswer</button>
        </span>

        <table class="routines-list" v-if="showquize">
            <tr>
                <td class="task-list-tilte">english</td>
                <td class="task-list-tilte">answer</td>
                <td class="task-list-tilte">japanese</td>
                <td class="task-list-tilte">study</td>
            </tr>
            <tr v-for="item in quizeData" :key="item.id" class="card-wrap">
                <td class="quize-list-english">{{ item.english }}</td>
                <td class="quize-list-japanese">
                    <button class="routine-list-body-btn" @click="showAnswer(item.id)">
                        answer
                    </button>
                    <button class="routine-list-body-btn" @click="hiddenAnswer(item.id)">
                        cancel
                    </button>
                </td>
                <td class="quize-list-japanese" v-if="item.value">{{ item.japanese }}</td>
                <td class="quize-list-japanese" v-else></td>
                <td class="quize-list-japanese" v-if="item.deleted_at == null">
                    <button class="routine-list-body-btn" @click="complete(item.id)">
                        complete
                    </button>
                </td>
                <td class="quize-list-japanese" v-else>{{ item.deleted_at }}</td>
            </tr>
        </table>

        <table class="routines-list" v-if="english_showquize">
            <tr>
                <td class="task-list-tilte">japanese</td>
                <td class="task-list-tilte">answer</td>
                <td class="task-list-tilte">english</td>
                <td class="task-list-tilte">study</td>
            </tr>
            <tr v-for="item in quizeData" :key="item.id" class="card-wrap">
                <td class="quize-list-japanese">{{ item.japanese }}</td>
                <td class="quize-list-english">
                    <button class="routine-list-body-btn" @click="showAnswer(item.id)">
                        answer
                    </button>
                    <button class="routine-list-body-btn" @click="hiddenAnswer(item.id)">
                        cancel
                    </button>
                </td>
                <td class="quize-list-english" v-if="item.value">{{ item.english }}</td>
                <td class="quize-list-english" v-else></td>
                <td class="quize-list-english" v-if="item.deleted_at == null">
                    <button class="routine-list-body-btn" @click="complete(item.id)">
                        complete
                    </button>
                </td>
                <td class="quize-list-english" v-else>{{ item.deleted_at }}</td>
            </tr>
        </table>

        <table class="routines-list" v-if="showquizeCurrent">
            <tr>
                <td class="task-list-tilte">english</td>
                <td class="task-list-tilte">answer</td>
                <td class="task-list-tilte">japanese</td>
                <td class="task-list-tilte">study</td>
            </tr>
            <tr v-for="item in quizeCurrnetData" :key="item.id" class="card-wrap">
                <td class="quize-list-english">{{ item.english }}</td>
                <td class="quize-list-japanese">
                    <button class="routine-list-body-btn" @click="showCurrentAnswer(item.id)">
                        answer
                    </button>
                    <button class="routine-list-body-btn" @click="hiddenCurrentAnswer(item.id)">
                        cancel
                    </button>
                </td>
                <td class="quize-list-japanese" v-if="item.value">{{ item.japanese }}</td>
                <td class="quize-list-japanese" v-else></td>
                <td class="quize-list-japanese" v-if="item.deleted_at == null">
                    <button class="routine-list-body-btn" @click="complete(item.id)">
                        complete
                    </button>
                </td>
                <td class="quize-list-japanese" v-else>{{ item.deleted_at }}</td>
            </tr>
        </table>

        <table class="routines-list" v-if="showCompleteList">
            <tr>
                <td class="task-list-tilte">english</td>
                <td class="task-list-tilte">japanese</td>
                <td class="task-list-tilte">study</td>
                <td class="task-list-tilte">return</td>
            </tr>
            <tr v-for="item in completeData" :key="item.id" class="card-wrap">
                <td class="quize-list-english">{{ item.english }}</td>
                <td class="quize-list-japanese">{{ item.japanese }}</td>
                <td class="quize-list-japanese" v-if="item.deleted_at == null">
                    <button class="routine-list-body-btn" @click="complete(item.id)">
                        complete
                    </button>
                </td>
                <td class="quize-list-japanese" v-else>{{ item.deleted_at }}</td>
                <td class="quize-list-japanese">
                    <button class="routine-list-body-btn" @click="returnItem(item.id)">
                        return
                    </button>
                </td>
            </tr>
        </table>

    </div>
</template>

<script>
export default {
  name: 'quize',
  data() {
      return {
          showquize:false,
          english_showquize:false,
          showquizeCurrent:false,
          quizeData:'',
          quizeCurrnetData:'',
          answerData:false,
          showCompleteList:false,
          completeData:'',
      }
  },

  methods: {
    JapaneseRandom : function() {
        axios.post('english_practice/list', {
            }).then(response  => {
                this.showCompleteList = false;
                this.showquize = true;
                this.showquizeCurrent = false;
                this.quizeData = response.data;
                this.showHiddenquize = true;
                this.english_showquize = false;
            }).catch(err => {
                console.log('err:', err);
            });
    },

    EnglishRandom : function() {
        axios.post('english_practice/list', {
            }).then(response  => {
                this.showCompleteList = false;
                this.showquize = false;
                this.english_showquize = true;
                this.showquizeCurrent = false;
                this.quizeData = response.data;
                this.showHiddenquize = true;
            }).catch(err => {
                console.log('err:', err);
            });
    },

    Recent : function(){
        axios.post('english_practice/cerruntList', {
            }).then(response  => {
                this.showCompleteList = false;
                this.showquizeCurrent = true;
                this.showquize = false;
                this.quizeCurrnetData = response.data;
                this.english_showquize = false;
                console.log(this.quizeCurrnetData);
            }).catch(err => {
                console.log('err:', err);
            });
    },

    showAnswer : function(id){
        this.quizeData.forEach((object, index) => {
            if(object.id == id){
                this.$set(object,'value','answer');
            }
        });
    },

    hiddenAnswer : function(id){
        this.quizeData.forEach((object, index) => {
            if(object.id == id){
                this.$set(object,'value',false);
            }
        });
    },

    showCurrentAnswer : function(id){
        this.quizeCurrnetData.forEach((object, index) => {
            if(object.id == id){
                this.$set(object,'value','answer');
            }
        });
    },

    hiddenCurrentAnswer : function(id){
        this.quizeCurrnetData.forEach((object, index) => {
            if(object.id == id){
                this.$set(object,'value',false);
            }
        });
    },

    hiddenAllAnswer : function(){
        this.quizeData.forEach((object, index) => {
            this.$set(object,'value',false);
        });
    },

    hiddenCurrentAllAnswer : function(){
        this.quizeCurrnetData.forEach((object, index) => {
            this.$set(object,'value',false);
        });
    },

    complete : function(id){
        axios.post('english_practice/complete/' + id,{
            id: this.id,
        }).then(response => {
            window.location.reload();
        }).catch(err => {
            console.log(err);
        });
    },

    completeList: function(){
        axios.post('english_practice/completeList', {
        }).then(response  => {
            this.showquize = false;
            this.completeData = response.data;
            this.showCompleteList = true;
            this.showquizeCurrent = false;
            console.log(this.completeData);
        }).catch(err => {
            console.log('err:', err);
        });
    },

    returnItem: function(id){
        axios.post('english_practice/returnItem/'+ id, {
            id: this.id,
        }).then(response  => {
            window.location.reload();
            console.log(response.data);
        }).catch(err => {
            console.log('err:', err);
        });
    }
  },
}
</script>