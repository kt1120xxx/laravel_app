<template>
    <div>
        <ul class="pagination">
            <li
                class="inactive"
                :class="(current_page == 1) ? 'disabled' : ''"
                @click="changePage(current_page-1)"
            >«</li>
            <li 
                v-for="page in frontPageRange" 
                :key="page" 
                @click.prevent="changePage(page)"
                :class="(isCurrent(page)) ? 'active' : 'inactive'"
            >{{ page }}</li>
            <li v-show="front_dot" class="inactive disabled">...</li>
            <li
                v-for="page in middlePageRange" 
                :key="page"
                @click.prevent="changePage(page)"
                :class="(isCurrent(page)) ? 'active' : 'inactive'"
              >{{ page }}</li>
            <li v-show="end_dot" class="inactive disabled">...</li>
            <li 
                v-for="page in endPageRange" 
                :key="page"
                @click.prevent="changePage(page)"
                :class="(isCurrent(page)) ? 'active' : 'inactive'"
             >{{ page }}</li>
            <li
                class="inactive"
                :class="(current_page >= last_page) ? 'disabled' : ''"
                @click="changePage(current_page+1)"
            >»</li>

        </ul>
        <ul>
            <li v-for="post in posts" :key="post.id">{{ post.id }} : {{ post.title }} : {{ post.body }}</li>
        </ul>
    </div>
</template> 

<script>
export default {
    data() {
        return {
            posts: [],
            current_page: 1,
            last_page: "",
            range: 5,
            front_dot: false,
            end_dot: false
        }
    },

    computed: {
        frontPageRange() {
            return this.calRange(1, 2);
        },
        middlePageRange() {
            let start = "";
            let end = "";
            if (this.current_page <= this.range) {
                start = 3;
                end = this.range + 2;
                this.front_dot = false;
                this.end_dot = true;
            } else if (this.current_page > this.last_page - this.range) {
                start = this.last_page - this.range - 1;
                end = this.last_page - 2;
                this.front_dot = true;
                this.end_dot = false;
            } else {
                start = this.current_page - Math.floor(this.range / 2);
                end = this.current_page + Math.floor(this.range / 2);
                this.front_dot = true;
                this.end_dot = true;
            }
            return this.calRange(start, end);
        },        
        endPageRange() {
            return this.calRange(this.last_page - 1, this.last_page);
        }
    },

    methods: {
        async getPosts() {
            console.log(this.current_page);
            const result = await axios.get('api/posts?page=${this.current_page}');
            const posts = result.data;
            this.current_page = posts.current_page;
            this.last_page = posts.last_page;
            this.posts = posts.data;
        },

        calRange(start, end) {
            const range = [];
            for (let i = start; i <= end; i++) {
                range.push(i);
            }
            return range;
        },

        changePage(page) {
            if (page > 0 && page <= this.last_page) {
                this.current_page = page;
                // console.log(page);
                this.getPosts();
            }
        }, 
        isCurrent(page) {
            return page === this.current_page;
        },   
    },
    created() {
        this.getPosts();
    },
};
</script>