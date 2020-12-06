<template>
  <div class="">
    <div
      class="uploader"
      @dragenter="onDragEnter"
      @dragleave="onDragLeave"
      @dragover.prevent
      @drop="onDrop"
      :class="{ dragging: isDragging, full: previewImages.length > 0 }"
    >
      <div
        class="flex justify-end absolute bottom-0 w-full border-t-4 border-dashed border-air-300 h-16"
        v-show="selectedFile.length && previewImages.length"
      >
        <label for="file" class="label-file mr-7 my-auto">Add More</label>
        <button @click="onUpload" class="upload-btn">
          <i class="fas fa-search text-2xl my-auto"></i>
          <span class="my-auto ml-2"> Upload </span>
        </button>
      </div>

      <div v-show="!previewImages.length" class="my-auto">
        <div class="text">
          <p class="text-lg font-bold">Drag here</p>
          <p class="text-sm text-gray-400">or</p>
        </div>

        <label for="file" class="label-file">Select Files</label>

        <input
          type="file"
          id="file"
          class="hidden"
          @change="onInput"
          multiple
        />
      </div>
      <div
        v-if="previewImages.length > 0"
        class="flex flex-wrap justify-center my-auto mb-20"
      >
        <div v-for="(file, index) in previewImages" :key="file.id">
          <preview-card
            @selected="selected"
            @deleted="deleted"
            @mount="previewMounted"
            :image="file.img"
            :name="selectedFile[index].name"
          ></preview-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
//import axios from 'axios'
import { v4 as uuidv4 } from 'uuid';

import PreviewCard from "./PreviewCard.vue";

export default {
  name: "ImageUpload",
  data() {
    return {
      isDragging: false,
      dragCount: 0,
      error: null,
      selectedFile: [],
      previewImages: [],
      fileToUpload: [],
    };
  },
  components: {
   PreviewCard,
  },

  methods: {
    onUpload() {
      //TODO: upload to the server
      console.log(this.fileToUpload[0]);
      //reset the image to upload so the user can't upload the same image more than once
      
      this.$emit('uploaded'),
      this.previewImages = [];
      this.selectedFile = [];
    },

    onInput(e) {
      const files = e.target.files;

      Array.from(files).forEach((file) => this.addImage(file));
    },

    onDragEnter(e) {
      e.preventDefault();

      this.dragCount++;
      this.isDragging = true;
    },

    onDragLeave(e) {
      e.preventDefault();

      this.dragCount--;

      if (this.dragCount <= 0) {
        this.isDragging = false;
      }
    },

    onDrop(e) {
      e.preventDefault();
      e.stopPropagation();

      this.isDragging = false;

      const files = e.dataTransfer.files;

      Array.from(files).forEach((file) => this.addImage(file));
    },

    addImage(file) {
      //check if if file is an image
      if (!file.type.match("image.*")) {
        //create error message
        this.error = {
          message: "The file is not an image",
        };
        console.log("errore: non un immagine");
        return;
      }

      this.selectedFile.push(file);

      //read the file in base64
      const reader = new FileReader();

      //push the base64 file in the preview array
      reader.onload = (e) => {
        
        this.previewImages.push({img : e.target.result, id : uuidv4()});
      };

      //manage error in the process
      reader.onerror = function (error) {
        this.error = {
          message: error,
        };
        console.log("Error: ", error);
      };
      //transform the file in base64
      reader.readAsDataURL(file);
    },

    selected(event) {
      const isIncluded = this.fileToUpload.some((el) => el.id == event.id);

      if (isIncluded) {
        const element = this.fileToUpload.find((el) => el.id == event.id);

        const index = this.fileToUpload.indexOf(element);

        this.fileToUpload[index].view = event.view;
        
      }
    },

    deleted(event) {
      const element = this.fileToUpload.find((el) => el.id == event.id);
      const index = this.fileToUpload.indexOf(element);
      this.fileToUpload.splice(index , 1);
      this.previewImages.splice(index, 1);
      this.selectedFile.splice(index, 1);
    },

    previewMounted(event) {
      this.fileToUpload.push(event);
    },
  },
};
</script>

<style scoped>
.container-upload {
  @apply container mx-auto flex flex-col justify-center align-middle w-3/4;
}
.uploader {
  @apply border-4 border-dashed border-air-300   w-full flex  justify-center align-middle mx-auto mt-10  relative;
}
.uploader {
  min-height: 300px;
}
.dragging {
  @apply bg-air-300 border-dashed border-air-500;
}
h1 {
  font-family: "Barlow Condensed", sans-serif;
}
.label-file {
  @apply text-xl font-bold block hover:text-air-500;
}
.upload-btn {
  @apply bg-transparent hover:bg-air-300 text-air-700 font-semibold hover:text-white py-2 px-4 border border-air-300 hover:border-transparent rounded h-10 my-auto mr-5 flex justify-center;
}
.full {
  @apply bg-air-50;
}
</style>