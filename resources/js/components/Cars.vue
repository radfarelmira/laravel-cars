<template>
<div>

    <div v-for="(car, index) in cars" :key="index" class="card" style="width: 18rem;">
        <img class="card-img-top" :src="car.img" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{car.marca}}</h5>
            <h6 class="card-text">{{car.modello}}</h6>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

</div>
    
</template>

<script>
export default {

name: 'Cars',

data: function(){
    return{
        cars: []
    };
},

methods: {

    getCars: function(){
        axios.get('http://127.0.0.1:8000/api/cars')
        .then((response)=>{
           this.cars = response.data.results;
           console.log(this.cars);
        });
    }

},

created: function(){
    this.getCars();
}

    
}
</script>

