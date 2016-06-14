# Custom Queries In Craft CMS

This is a plugin created for [MilesHerndon](http://milesherndon.com/) Craft CMS projects. It creates a starting point for all advanced Craft CMS database queries that are not native to craft.entries ElementCriteriaModel. To be more specific, the plugin sets the stage to allow for custom modifications of Craft's **ElementCriteriaModel** using `buildElementsQuery()` function.

The inspiration for this plugin was taken from the [Craft CMS: Building Complex Queries by Extending the ElementCriteriaModel](http://blog.tighten.co/craft-cms-building-complex-queries-by-extending-the-elementcriteriamodel) on the [Tighten.co](http://tighten.co/) blog. There [plugin](https://github.com/tightenco/craft-build-query) is also another great resource.


With this plugin, you will have the ability to...

* Use Craft's **Query Builder** in order to utilize any of Craft's **[DbCommand](https://craftcms.com/classreference/etc/db/DbCommand)**.
* Increase website's performance by making queries more efficient / effective.
* Work directly with Craft's **[ElementCriteriaModel](https://craftcms.com/docs/plugins/working-with-elements)** to build queries.
* Create a custom Database Table to incorporate into your custom queries.
* Utilize the built in pagination option after your query is injected into your template.


### Installation

Add the `customquerybuilder` folder to your `craft/app/plugins` directory, then activate the Custom Query Builder plugin in the `settings/plugins` section of the Craft's control panel. _*Note:_ If you edit any of the `records` or `models` files, the plugin will have to be uninstalled and reinstalled for those changes to take effect.



### Usage Within Twig Template

There is an example of how to get started using this plugin in the `example-query.twig` file of the plugin's directory. However, below is the basic query that is run within that file. The `page` & `entriesPerPage` variables are optional and are only used if you wish to utilize the pagination feature.

```twig
craft.customQueryBuilder.customQuery(page, entriesPerPage)
```
