<template>
  <div class="search-reslut">
      <p class="week-search">week search</p>
        <div id="content">
            <div>
                <input type="text" v-model="searchWeek" class="title-form modal-form">
            </div>
            <button @click="searchData(searchWeek)" class="search-btn btn-primary">search</button>
        </div>
        <div v-if="searchFrom">
            <button @click="searchCnacel" class="search-cancel-button">cancel</button>
            <table class="routines-list">
                <tr>
                    <td class="task-list-tilte">week</td>
                    <td class="task-list-tilte">todo</td>
                    <td class="task-list-tilte">type</td>
                    <td class="task-list-tilte">memo</td>
                    <td class="task-list-tilte">time</td>
                    <td class="task-list-tilte">create</td>
                </tr>

                <tr v-for="item in searchWeek" class="card-wrap">
                    <td class="routine-list-body">{{ item.week }}</td>
                    <td class="routine-list-body">{{ item.todo }}</td>
                    <td class="routine-list-body">{{ item.type }}</td>
                    <td class="routine-list-body">{{ item.memo }}</td>
                    <td class="routine-list-body">{{ item.start }}:00~{{ item.end }}:00</td>
                    <td class="routine-list-body">{{ item.created_at}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
export default {
  name: 'weekParent',
  data() {
      return {
          searchWeek:'',
          searchFrom:false,
      }
  },

  methods: {
    searchData : function(searchWeek) {
        console.log(searchWeek);
        axios.post('routine/searchWeek/'+ searchWeek , {
                searchWeek: this.searchWeek,
            }).then(response  => {
                console.log(response.data);
                this.searchWeek = response.data;
                this.searchFrom = true;
            }).catch(err => {
                console.log('err:', err);
                this.searchWeek = '曜日を入力して。';
            });
    },

    searchCnacel: function(){
        this.searchWeek = '';
        this.searchFrom = false;
    },

  },
}
</script>