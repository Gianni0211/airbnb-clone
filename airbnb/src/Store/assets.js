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
        async fetchCategory(context) {
            const res = await axios.get("api/get_all_categories");
            let cat = res.data.map((el) => {
                return {
                    img : el.img = `http://localhost:8000${el.img}`,
                    ...el
                }
            })
            context.commit("setCategory", cat);
        }
    }
};
