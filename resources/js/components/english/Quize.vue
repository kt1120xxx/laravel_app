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
            <button @click="Priority()" class="quize-btn btn-outline-danger">priority</button>
            <select v-model="priority">
                <option v-for="option in options" v-bind:value="option.name" v-bind:key="option.id">
                    {{ option.name }}
                </option>
            </select>
        </span>
        <span id="content">
            <button @click="completeList()" class="quize-btn btn-outline-dark">completeList</button>
        </span>

        <!-- 英語、日本語の単語の非表示ボタン -->
        <span id="content" v-if="showHiddenquize">
            <button @click="hiddenAllAnswer()" class="quize-btn btn-outline-danger">hidden</button>
        </span>

        <!-- 直近で登録した単語の非表示ボタン -->
        <span id="content" v-if="showquizeCurrent">
            <button @click="hiddenCurrentAllAnswer()" class="quize-btn btn-outline-danger">hidden</button>
        </span>

        <!-- 優先順位で表示する単語の非表示ボタン -->
        <span id="content" v-if="showquizePriority">
            <button @click="hiddenPriorityAllAnswer()" class="quize-btn btn-outline-danger">hidden</button>
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

        <table class="routines-list" v-if="priority_showquize">
            <tr>
                <td class="task-list-tilte">japanese</td>
                <td class="task-list-tilte">answer</td>
                <td class="task-list-tilte">english</td>
                <td class="task-list-tilte">study</td>
            </tr>
            <tr v-for="item in quizepriorityData" :key="item.id" class="card-wrap">
                <td class="quize-list-japanese">{{ item.japanese }}</td>
                <td class="quize-list-english">
                    <button class="routine-list-body-btn" @click="showPriorityAnswer(item.id)">
                        answer
                    </button>
                    <button class="routine-list-body-btn" @click="hiddenPriorityAnswer(item.id)">
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
        // クイズデータ定義
          quizeData:'',
          quizeCurrnetData:'',
        　quizepriorityData:'',
        　completeData:'',

        // クイズの表示可否
          showquize:false,
          showquizeCurrent:false,
          showquizePriority:false,
          english_showquize:false,
        　priority_showquize:false,
          showCompleteList:false,

        // 非表示ボタン
          showHiddenquize:false,

        //  優先順位用の初期データ
          priority: '',
          options: [
            { id: 1, name: 'High' },
            { id: 2, name: 'Middle' },
            { id: 3, name: 'Low' }
          ],
      }
  },

  methods: {
    JapaneseRandom : function() {
        axios.post('english_practice/list', {
            }).then(response  => {
                this.showquize = true;
                this.showHiddenquize = true;
                this.english_showquize = false,
                this.showquizeCurrent = false,
                this.priority_showquize = false,
                this.showquizePriority = false,
                this.showCompleteList = false,
                this.quizeData = response.data;
            }).catch(err => {
                console.log('err:', err);
            });
    },

    EnglishRandom : function() {
        axios.post('english_practice/list', {
            }).then(response  => {
                this.english_showquize = true;
                this.showHiddenquize = true;
                this.showquize = false;
                this.showquizeCurrent = false;
                this.priority_showquize = false;
                this.showquizePriority = false,
                this.showCompleteList = false;
                this.quizeData = response.data;
            }).catch(err => {
                console.log('err:', err);
            });
    },

    Recent : function(){
        axios.post('english_practice/cerruntList', {
            }).then(response  => {
                this.showquizeCurrent = true;
                this.showquize = false;
                this.english_showquize = false;
                this.priority_showquize = false;
                this.showquizePriority = false,
                this.showCompleteList = false;
                this.quizeCurrnetData = response.data;
            }).catch(err => {
                console.log('err:', err);
            });
    },

    Priority : function(){
        axios.post('english_practice/priorityList/' + this.priority, {
            }).then(response  => {
                this.priority_showquize = true;
                this.showquizePriority = true,
                this.showHiddenquize = false;
                this.showquize = false;
                this.english_showquize = false;
                this.showquizeCurrent = false;
                this.showCompleteList = false;
                this.quizepriorityData = response.data;
                console.log(response.data);
            }).catch(err => {
                console.log('err:', err);
            });
    },

    completeList: function(){
        axios.post('english_practice/completeList', {
        }).then(response  => {
            this.showCompleteList = true;
            this.showquizePriority = false,
            this.showquize = false;
            this.english_showquize = false;
            this.showquizeCurrent = false;
            this.showHiddenquize = false;
            this.completeData = response.data;
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

    showPriorityAnswer : function(id){
        console.log(id);
        this.quizepriorityData.forEach((object, index) => {
            if(object.id == id){
                this.$set(object,'value','answer');
            }
        });
    },

    hiddenPriorityAnswer : function(id){
        this.quizepriorityData.forEach((object, index) => {
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

    hiddenPriorityAllAnswer : function(){
        this.quizepriorityData.forEach((object, index) => {
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