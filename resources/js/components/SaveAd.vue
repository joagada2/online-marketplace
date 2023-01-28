<template>
    <div>
        <button v-if="saveBtn" class = "btn btn-info" @click.prevent="savedAd()">
            <i class = "fas fa-heart"
        ></i>
        Save this ad
        </button>
        <p v-else class = "alert alert-success">
            Advertisement saved !
        </p>
    </div>
</template>

<script>
import axios from 'axios';

export default{
    props:['adId','userId'],
    data(){
        return{
            saveBtn:true,

        }
    },
    methods:{

        savedAd(){
            axios.post('/ad/save',{
                adId:this.adId,
                userId:this.userId
            }).then((resonse)=>{
                this.saveBtn=false
            }).catch((err)=>{
                alert('Error!')
            })
        }
    }
}
</script>

