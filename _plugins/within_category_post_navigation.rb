# Plugin Name: Jekyll Post Navigation With A Category
# Plugin URI: http://ajclarkson.co.uk/blog/jekyll-category-post-navigation/
# Description: Call next post in current category.
# Author: Adam Clarkson
# Author URI: http://ajclarkson.co.uk/
# Date: 2013-10-23

module Jekyll
	class WithinCategoryPostNavigation < Generator
		def generate(site)
			site.categories.each_pair do |category, posts|
				posts.sort! { |a,b| b <=> a}
				posts.each do |post|
					index = posts.index post
					next_in_category = nil
					previous_in_category = nil
					if index
						if index < posts.length - 1
							next_in_category = posts[index + 1]
						end
						if index > 0
							previous_in_category = posts[index - 1]
						end
					end
					post.data["next_in_category"] = next_in_category unless next_in_category.nil?
					post.data["previous_in_category"] = previous_in_category unless previous_in_category.nil?
				end
			end
		end
	end
end