wp.blocks.registerBlockType("outplugin/are-you-paying-attent", {
  title: "Are you Paying Attention?",
  icon: "smiley",
  attributes : {
     skypeColor : {type:"string"},
     grassColor : {type:"string"},
  },
  category: "common",
  //display in admin
  edit: function (props) {
    function updateSkyColor(event) {
      props.setAttributes({skypeColor:event.target.value})
    }
    function updateGrassColor(event){
      props.setAttributes({grassColor:event.target.value})
    }
    return (
      <div>
        <input
          type="text"
          name="skypeColor"
          placeholder = "Sky color"
          value={props.attributes.skypeColor}
          onChange={updateSkyColor}
        />
        <input
          type="text"
          name="grassColor"
          placeholder="grass color"
          value={props.attributes.grassColor}
          onChange={updateGrassColor}
        />
      </div>
    );
  },
  // display in front end when public
  save: function (props) {
    return null;
  },
});
