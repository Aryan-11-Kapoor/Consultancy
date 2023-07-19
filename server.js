const express = require("express")
const colors = require("colors")
const morgan = require("morgan")
const dotenv = require("dotenv");
const connectDB = require("./config/db");

//dotenv config
dotenv.config({path:"./config/ .env"});
//require('dotenv').config({ path: require('find-config')('.env') })
dotenv.config();
console.log(process.env.MONGO_URL); 

//mongodb connection
connectDB();

//rest object
const app = express()

//middlewares
app.use(express.json())
app.use(morgan('dev'))

//routes
app.get("/", () =>
{
    res.status(200).send(
        {
            message:"server running",
        });
});

//port
const port = process.env.PORT || 8080
//listen port
app.listen(port, (err) => {
    if (err) {
        return console.error(err);
    }
    return console.log(`server is listening on ${port}`);
});
//app.listen(port, () =>{
    //console.log(
     //   `Server running in ${process.env.NODE_MODE} Mode on port ${process.env.PORT}` .bgCyan.white
     //   );
//});
