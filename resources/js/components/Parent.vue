<template>
  <div id="app">
    <p>{{count}} 回、子供のボタンが押されました</p>

      <child :msg='searchTitle' @ChildBtnClick="increment" />

      <div id="content">
        <div>
            <input type="text" v-model="searchTitle" class="title-form modal-form">
        </div>
        <button @click="searchData(searchTitle)" class="modal-edit-button">けんさく</button>
        <button @click="searchCnacel" class="search-cancel-button">クリア</button>
      </div>

      <div v-if="searchFrom">
          <div class="search-wrap">検索結果
              <ul v-for="item in searchResult" class="card-wrap">
                  <div class="card-header">
                      id：{{ item.id }}<br>
                  </div>
                  <div class="card-header">
                      タイトル：{{ item.title }}
                  </div>
                  <div class="card-body">
                      <p class="card-text">
                      内容：{{ item.body }}
                      </p>
                  </div>
                  <div class="card-footer">
                      <span class="mr-2">
                      投稿日時 ：{{ item.created_at }}
                      </span>
                  </div>
              </ul>
          </div>
      </div>

  </div>

</template>

<script>

import Child from './Child.vue';

export default {
  name: 'Parent',

  components: {
    Child
  },
  data() {
    return {
      count: 0,
      test: '',
      searchTitle:'検索したいワードを入力',
      searchExitst: '',
      searchResult: '',
      searchFrom: false,
    }
  },

  methods: {
    increment(el) {
      this.count += el.num,
      this.test = el.test,
      console.log(el);
    },

    searchData : function(searchTitle) {
        console.log(searchTitle);
        axios.post('/api/topics/search/'+ searchTitle , {
                searchResult: this.searchResult,
            }).then(response  => {
                this.searchResult = response.data;
                this.searchFrom = true;
                this.searchExitst = this.searchResult.length;

                if(this.searchResult.length){
                    this.searchTitle = '検索文字列は'+ searchTitle + 'です。';
                }else{
                    this.searchTitle = '該当結果はありません。';
                }
            }).catch(err => {
                console.log('err:', err);
            });
    },

    searchCnacel: function(){
        this.searchTitle = '';
        this.searchFrom = false;
    },
  },
};
</script>
