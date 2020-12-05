import axios from "axios";

export default {
    namespaced: true,
    state: {
        categories: []
    },
    getters: {
        categories (state) {
            return state.categories;
        } 
    },

    mutations: {
        setCategory(state, categories) {
            categories.forEach(category => {
                state.categories.push(category);
            });
        }
    },
    actions: {
        async fetchCategory({commit,state}) {
            if(state.categories.length > 0) return
            const res = await axios.get("api/get_all_categories");
            let cat = res.data.map((el) => {
                return {
                    img : el.img = `http://localhost:8000${el.img}`,
                    ...el
                }
            })
           commit("setCategory", cat);
        }
    }
};
