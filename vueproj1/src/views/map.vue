<template>
<v-container>
  <objectdetect/>

<div style="height: 500px; width: 100%">
  <div style="height: 200px; overflow: auto;">
    <p>First marker is placed at {{ withPopup.lat }}, {{ withPopup.lng }}</p>
    <p>Center is at {{ currentCenter }} and the zoom is: {{ currentZoom }}</p>
    <button @click="showLongText">
      Toggle long popup
    </button>
    <button @click="showMap = !showMap">
      Toggle map
    </button>
  </div>
  <l-map
    v-if="showMap"
    :zoom="zoom"
    :center="center"
    :options="mapOptions"
    style="height: 80%"
    @update:center="centerUpdate"
    @update:zoom="zoomUpdate"
  >
    <l-tile-layer
      :url="url"
      :attribution="attribution"
    />
    <l-marker :lat-lng="withPopup">
      <l-popup>
        <div @click="innerClick">
          I am a popup
          <p v-show="showParagraph">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
            sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
            Donec finibus semper metus id malesuada.
          </p>
        </div>
      </l-popup>
    </l-marker>
    <l-marker :lat-lng="withTooltip">
      <l-tooltip :options="{ permanent: true, interactive: true }">
        <div @click="innerClick">
          I am a tooltip
          <p v-show="showParagraph">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
            sed pretium nisl, ut sagittis sapien. Sed vel sollicitudin nisi.
            Donec finibus semper metus id malesuada.
          </p>
        </div>
      </l-tooltip>
    </l-marker>
  </l-map>
</div>
</v-container>

</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";
import objectdetect from "@/components/ObjectDetect.vue";

export default {
name: "MapView",
components: {
  objectdetect,
  LMap,
  LTileLayer,
  LMarker,
  LPopup,
  LTooltip
},
data() {
  return {
    zoom: 13,
    center: latLng(-26.41322, 153.219482),
    url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    attribution:
      '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    withPopup: latLng(-27.41322, 153.219482),
    withTooltip: latLng(-27.41422, 153.250482),
    currentZoom: 3.5,
    currentCenter: latLng(-27.01322, -153.219482),
    showParagraph: false,
    mapOptions: {
      zoomSnap: 0.5
    },
    showMap: true
  };
},
methods: {
  zoomUpdate(zoom) {
    this.currentZoom = zoom;
  },
  centerUpdate(center) {
    this.currentCenter = center;
  },
  showLongText() {
    this.showParagraph = !this.showParagraph;
  },
  innerClick() {
    alert("Click!");
  }
}
};
</script>