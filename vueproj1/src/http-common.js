import axios from "axios";

export default axios.create({
  baseURL: "https://infs3202-942629ae.uqcloud.net/",
  headers: {
    "Content-type": "application/json"
  }
});