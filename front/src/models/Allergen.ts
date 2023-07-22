import { Ingredient } from "./Ingredient";

export interface Allergen {
  name: string;
  description: string;
  icon_name: string;
  risk: number;
  ingredients?: Ingredient[];
}
