<template>
<!-- 外枠 -->
    <div>
        <div class="searching-wrap">
            <div>
                <input type="text" v-model="searchTitle" class="title-form modal-form">
            </div>
            <button @click="searchData(searchTitle)" class="modal-edit-button">けんさく</button>
        </div>

        <div v-if="searchFrom">
            <button @click="searchCnacel" class="search-cancel-button">キャンセル</button>
            <div class="search-wrap">検索結果
                <ul v-for="item in searchTitle" class="card-wrap">
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

<!-- post送信form -->
        <div class="container">
            <h1 v-if="saved">データは登録されました～</h1>
            <form class="form-wrap">
                <div class="form-group">
                    <div for="TopicTitle" class="top-title">タイトル</div>
                    <input type="text" class="title-form" id="TopicTitle" v-model="title">
                </div>
                <div class="form-group">
                    <div for="TopicBody" class="top-body">内容</div>
                    <textarea class="body-form" id="TopicBody" rows="3" v-model="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" @click="createData">とうこう</button>
            </form>
        </div>
<!-- post送信form -->
<!-- 一覧表示 -->
        <ul v-for="item in posts" class="card-wrap">
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


            <!-- モーダル表示 -->
            <button @click="updateModal(item.id, item.title, item.body)">編集</button>
                <div id="overlay" v-show="showContent">
                    <div id="content">
                        <div>
                            <div class="top-title">タイトル：</div>
                            <input type="text" v-model="updateTitle" class="title-form modal-form">
                        </div>
                        <div>
                            <div class="top-body">内容：</div>
                            <textarea v-model="updateBody" class="body-form modal-form" rows="3" ></textarea>
                        </div>
                        <button @click="updateData(updateId, updateTitle, updateBody)" class="modal-edit-button">edit</button>
                        <button @click="closeModal" class="modal-edit-button">close</button>
                    </div>
                </div>
            <!-- モーダル表示 -->


            <button 
                @click="deleteData(item.id)"
            >
                削除
            </button>
        </ul>
<!-- 一覧表示 -->
<!-- 外枠 -->
    </div>
</template>

<script>
export default {
    props: ["posts"],
    data() {
        return {
            showContent: false,
            saved: false,
            id: '',
            title: '',
            body: '',
            updateId: '',
            updateTitle: '',
            updateBody: '',
            searchTitle:'',
            searchFrom: false,
        }
    },

    mounted :function(){
        axios.get('/apitest')
            .then(response => 
            console.log(response)
                // this.users = response.data,
            )
            .catch(response => console.log(response))
    },

    methods: {
        openModal: function(){
            this.showContent = true
        },
        closeModal: function(){
            this.showContent = false
        },

        showEl : function(){
            console.log(this.$el)
        },
        
        createData : function() {
            axios.post('/api/topics', {
                    id: this.id,
                    title: this.title,
                    body: this.body
                }).then(response  => {
                    console.log(response)
                    this.id = '';
                    this.title = '';
                    this.body = '';
                    this.saved = true;
                }).catch(err => {
                    console.log('err:', err);
                });
        },
        updateModal: function(updateId, updateTitle, updateBody) {
            this.updateId = updateId
            this.updateTitle = updateTitle
            this.updateBody = updateBody
            this.showContent = true
        },

        searchData : function(searchTitle) {
            console.log(searchTitle);
            axios.post('/api/topics/search/'+ searchTitle , {
                    searchTitle: this.searchTitle,
                }).then(response  => {
                    console.log(response.data);
                    this.searchTitle = response.data;
                    this.searchFrom = true;
                    // console.log(response.searchTitle);
                }).catch(err => {
                    console.log('err:', err);
                });
        },

        searchCnacel: function(){
            this.searchTitle = '';
            this.searchFrom = false;
        },

        updateData : function(updateId, updateTitle, updateBody) {
            this.showContent = false
            axios.post('/api/topics/update/'+ updateId + '/' + updateTitle + '/' + updateBody, {
                    updateId: this.updateId,
                    updateTitle: this.updateTitle,
                    updateBody: this.updateBody
                }).then(response  => {
                    this.updateId = '';
                    this.updateTitle = '';
                    this.updateBody = '';
                    window.location.reload();
                }).catch(err => {
                    console.log('err:', err);
                });
        },

        deleteData : function(deleteId){
            console.log(deleteId);
                axios.post('/api/topics/delet/' + deleteId, {
                    id: deleteId
                }).then(response  => {
                    this.id = '';
                    window.location.reload();
                }).catch(err => {
                    console.log('err:', err);
                });
        },
        
        created: function () {
            //投稿のデータを取得したものをログ表示(テスト)
            // console.log(this.posts.data);
            // this.searchData();
        },

    },

}
</script>