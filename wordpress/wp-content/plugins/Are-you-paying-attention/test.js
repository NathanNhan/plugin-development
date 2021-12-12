wp.blocks.registerBlockType("outplugin/are-you-paying-attent",{
    title : "Are you Paying Attention?",
    icon : "smiley",
    category : "common",
    //display in admin
    edit : function () {
        return wp.element.createElement("h3", null, "Hello, this is from the admin editor screen.")
    },
    // display in front end when public
    save : function () {
        return wp.element.createElement(
          "h1",
          null,
          "Hello, this is the front end."
        );
    }
})